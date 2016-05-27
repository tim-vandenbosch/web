<?php
/* @author = Nida
 * Date = 10/05/2016
 */
class profiel_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_model', '', TRUE);
        $this -> load -> model('ticket_model', '', TRUE);
    }

    /* @author =  Nida
     */
    function index()
    {
        $this -> checkSession();
        $session_data = $this -> session -> userdata('logged_in');
        $id['userID'] = $session_data['userID'];

        // Specfieke methode oproepen vanuit een model

        $this -> load -> model('user_model');
        $user = (array) $this -> user_model -> get_user_by_id($id['userID']);
        $rol = $user['rol'];

        $tic =  array('userID' => $session_data['userID'], 'tickets' => $this -> ticket_model -> getUserTickets($id['userID']));

        $data = $tic + $user;
        $this -> load -> view('Layout/header');
        if($rol=='Admin')
        {
            $this -> load -> view('Layout/navigationAdmin');
        }
        else
        {
            $this -> load -> view('Layout/navigation');
        }
        $this -> load -> view('profiel_view',$data ); // merge 2 arrays
        $this -> load -> view('Layout/footer');
    }
    /* @author = Nida
     * Date = 10/05/2016
     *
     * Doel: toont het profiel van admin. Hierin wordt het email adres en rol getoond van de Admin.
     * Door op de knop "Wachtword wijzigen" te klikken, kan het wachtword aangepast worden.
     */
    function profiel_admin(){
        $this -> checkSession();
        $session_data = $this -> session -> userdata('logged_in');
        $id['userID'] = $session_data['userID'];

        // Specfieke methode oproepen vanuit een model

        $this -> load -> model('user_model');
        $user = (array) $this -> user_model -> get_user_by_id($id['userID']);
        $rol = $user['rol'];

        $data = $user;
        $this -> load -> view('Layout/header');
        if($rol=='Admin')
        {
            $this -> load -> view('Layout/navigationAdmin');
        }
        else
        {
            $this -> load -> view('Layout/navigation');
        }
        $this -> load -> view('Admin/profiel_admin',$data ); // merge 2 arrays
        $this -> load -> view('Layout/footer');
    }

    /* @author = Nida
     * het knop "Wachtword wijzigen" verwijst naar deze function.
     * Deze function dient om de view in te laden.
     */
    function aanvraagNewPw()
    {
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this-> load -> view ('newPass');
        $this -> load -> view('Layout/footer');
    }


    /* @author: Nida
     * Deze function dient om de ingegeven email-adres, huidige wachtwordt, nieuwe wachtword en herhaling van nieuwe wachtword
     * te valideren.
     * In het geval van een validation failt, wordt er ook een gepaste melding getoond.
     * Deze function maakt ook gebruik van andere validatie functies.
     * --> Wordt aangeroepen vanuit de view: newPass.php
    */
    function check_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
        $this->form_validation->set_rules('newpassword', 'Newpassword', 'required|callback_checkPassReq');
        $this -> form_validation -> set_rules('re_password', 'Retype password', 'required|matches[newpassword]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('layout/header');
            $this->load->view('layout/navigation');
            $this->load->view('newPass');
            $this->load->view('Layout/footer');
        }
        else
        {
            $this->saveChanges();
        }
    }

    /* @author: Nida
     * Deze function dient om de ingegeven email-adres en huidige wachtwordt
     * te valideren op de juistheid.
     * In het geval van een validation failt, wordt er ook een gepaste melding getoond.
     *
     * --> Wordt niet aangeroepen vanuit de view.
     * --> wordt gebruikt door: function check_pass
     */
    function check_database($password)
    {
        $email = $this -> input -> post('email');
        $result = $this -> user_model -> login($email,$password);
        
        $this -> checkSession();
        $session_data = $this -> session -> userdata('logged_in');
        $id['userID'] = $session_data['userID'];

        $this -> load -> model('user_model');
        $user = (array) $this -> user_model -> get_user_by_id($id['userID']);


        if ($email != $user['email']){
            $this -> form_validation -> set_message('check_database', 'Het emailadres komt niet overeen met ingelogde account.');
            return FALSE;
        }

        if($result)
        {
            foreach($result as $row)
            {
                $sess_array = array('userID' => $row->userID, 'email' => $row->email);
                $this -> session -> set_userdata('logged_in',$sess_array);
            }
            return TRUE;
        }
        else
        {
            $this -> form_validation -> set_message('check_database', 'Het emailadres en wachtwoord komen niet overeen');
            return FALSE;
        }
    }


    /* @author: Nida
     * Deze function dient om de ingegeven nieuwe wachtwordt
     * te valideren op de juisyheid.
     * (validatie createria: - Wachtword mag min 8 en max 20 karakters bevatten. - Wachtwordt moet minimum
     * één getal, letter en hoofdletter.)
     * In het geval van een validation failt, wordt er ook een gepaste melding getoond.
     *
     * --> Wordt niet aangeroepen vanuit de view.
     * --> wordt gebruikt door: function check_pass
     */
    function checkPassReq($newpassword)
    {
        if( strlen($newpassword) < 8 ||  strlen($newpassword) > 20 || (!preg_match("#[0-9]+#", $newpassword)) ||
            ( !preg_match("#[a-z]+#", $newpassword) ) || ( !preg_match("#[A-Z]+#", $newpassword) ) )
        {
            $this->form_validation->set_message('checkPassReq',"Wachtword voldoet niet aan de voorwarden. - Wachtword mag min 8 en max 20 karakters bevatten. - Wachtwordt moet minimum één getal, letter en hoofdletter. ");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    /* @author: Nida
     * Deze function dient om de ingegeven nieuwe wachtword en herhaling nieuwe wachtword
     * te valideren op de gelijkheid.
     * (createria: - nieuwe wachtword en herhaling nieuwe wachtword )
     * In het geval van een validation failt, wordt er ook een gepaste melding getoond.
     *
     * --> Wordt niet aangeroepen vanuit de view.
     * --> wordt gebruikt door: function check_pass
     */
    function check_re_password($newpassword, $re_password)
    {
        if($newpassword != $re_password){
            $this->form_validation->set_message('check_re_password',"Nieuwe wachtword en herlaald veld komt niet overeen.");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    /* @author: Nida
     *
     * Deze function dient om de ingegeven nieuwe wachtword te steuren naar de model.
     *
     *
     * --> Wordt niet aangeroepen vanuit de view.
     * --> wordt gebruikt door: function check_pass
     * Na dat de vaidatie volledig in orde is, wordt deze mathode aangeroepen om
     * de gegevens naar de model te steuren.
     */
    function saveChanges()
    {
        $this -> checkSession();
        $session_data = $this -> session -> userdata('logged_in');
        $id['userID'] = $session_data['userID'];


        $id = $this -> input->post('userId');
        $npass=$this->input->post('newpassword');

        $this -> user_model -> updateAccountPass($id, $npass);

        // $user = (array) $this -> user_model -> get_user_by_id($id['userID']);

        redirect('profiel_controller','index');
    }

    /* @author = Marnix
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login', 'refresh');
        }
    }
}
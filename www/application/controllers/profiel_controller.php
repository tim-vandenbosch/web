<?php
/* @author = Marnix
 * Date = 10/05/2016
 */
class profiel_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_model', '', TRUE);
        $this -> load -> model('ticket_model', '', TRUE);
        $this->load->library('form_validation');
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
     */
    function aanvraagNewPw()
    {
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this-> load -> view ('newPass');
        $this -> load -> view('Layout/footer');
    }


    /* author: Nida*/
    function check_pass()
    {

        $this -> form_validation -> set_rules('email','Email','required|valid_email');
        $this -> form_validation -> set_rules('password','Password','trim|required|callback_check_database');
        $this -> form_validation -> set_rules('re_password', 'Re_password', 'required|callback_check_re_password');
        $this -> form_validation -> set_rules('newpassword', 'Newpassword', 'required|callback_checkPassReq');
        //$this->form_validation->set_message('checkPassReq');


        if($this -> form_validation -> run() == FALSE)
        {
            //echo ("not Ok");
            $this -> load -> view ('layout/header');
            $this -> load -> view ('layout/navigation');
            $this -> load -> view('newPass');
            $this -> load -> view('Layout/footer');

        }
        else
        {
            //echo ("Ok");

        }
    }
    function check_database($password)
    {
        $email = $this -> input -> post('email');
        $result = $this -> user_model -> login($email,$password);

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
            return false;
        }
    }

    function checkPassReq($newpassword){

        if( strlen($newpassword) < 8 ||  strlen($newpassword) > 20 || (!preg_match("#[0-9]+#", $newpassword)) ||
            ( !preg_match("#[a-z]+#", $newpassword) ) || ( !preg_match("#[A-Z]+#", $newpassword) ) ) {
            $this->form_validation->set_message('checkPassReq',"Wachtword voldoet niet aan de voorwarden. - Wachtword mag min 8 en max 20 karakters bevatten. - Wachtwordt moet minimum één getal, letter en hoofdletter. ");
            return false;
        }
        else
        {
            return TRUE;
        }
    }

    function check_re_password($newpassword, $re_password){
        if($newpassword != $re_password){
            $this->form_validation->set_message('check_re_password',"Nieuwe wachtword en herlaald veld komt niet overeen.");
            return false;
        }
        else
        {
            return TRUE;
        }
    }
    function saveChanges(){
        $pass= $this->input->post('old_password');
        $npass=$this->input->post('newpassword');
        $rpass=$this->input->post('re_password');

        $this -> load -> user_model -> updateAccountPass($pass, $npass, $rpass);
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
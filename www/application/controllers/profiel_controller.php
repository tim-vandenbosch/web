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

    /* @author = ?
     */
    function aanvraagNewPw()
    {
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this-> load -> view ('newPass');
        $this -> load -> view('Layout/footer');
    }
    function changePass(){
        $pass= $this->input->post('old_password');
        $npass=$this->input->post('newpassword');
        $rpass=$this->input->post('re_password');

        $this -> load -> user_model -> updateAccountPass($pass, $npass, $rpass);
    }
    /* author: Nida*/
    function check_pass($password)
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
            $this -> form_validation -> set_message('check_database', 'Het wachtwoord komen niet overeen met deze account.');
            return false;
        }
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
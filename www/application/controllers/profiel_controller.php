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
            $this -> load -> view('Layout/navigationNoTicket');
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
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @Author britt & Tim
 * Date: 3/05/2016
 * modified 10/05
 * @Author: marnix
 */

//Deze controller zorgt voor de sessies en na de login het algemene gedeelte

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_model', '', TRUE);
        $this -> load -> model('ticket_model', '', TRUE);
    }

    function index()
    {
        $this -> checkSession();
        $session_data = $this -> session ->  userdata('logged_in');
        $data['userID'] = $session_data['userID'];
        $userID = $session_data['userID'];
        $rol = $this -> user_model -> neem_rol($userID);
            
        // Op basis van de rol de juiste view meegeven
        switch ($rol)
        {
            case "Admin":
                $data = array('userID' => $session_data['userID'], 'users' => $this->user_model->get_users());
                $this -> load -> view('Layout/header');
                $this -> load -> view('Layout/navigation');
                $this -> load -> view('/Admin/admin_view',$data);
                $this -> load -> view('Layout/footer');
                break;
            case "Dispatcher":
                $data =  array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getAllTickets());
                $this -> load -> view('Layout/header');
                $this -> load -> view('Layout/navigation');
                $this -> load -> view('/Dispatcher/index', $data);
                $this -> load -> view('Layout/footer');
                break;
            case "Werkman":
                $data =  array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getAllTickets());
                $this -> load -> view('Layout/header');
                $this -> load -> view('Layout/navigation');
                $this -> load -> view('/Werkman/index');
                $this -> load -> view('/Tickets/lijst_tickets', $data);
                $this -> load -> view('Layout/footer');
                break;
            case "Docent":
                $data = array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getAllTickets());
                $this -> load -> view('Layout/header');
                $this -> load -> view('Layout/navigation');
                $this -> load -> view('user_view', $data);
                $this -> load -> view('Layout/footer');
                break;
            default:
                $this -> load -> view('login_view');
                break;
        }
    }

/*
 * @Author: Britt & Tim
 * Date: 03/05/2016
 * Bron: http://www.iluv2code.com/login-with-codeigniter-php.html
 * zorgt dat de sessie vernietigd wordt & de login pagina terug gezien wordt (user is afgemeld).
 */
    function logout()
    {
        $session_data = $this -> session -> userdata('logged_in');
        $userID = $session_data['userID'];
        $rol = $this -> user_model -> neem_rol($userID);
        $enquete = $this -> user_model -> check_enquete($userID);

        // @Author: Britt
        // Date: 28/05/2016
        // Deze if zorgt ervoor dat de docent een enquete krijgt als deze nog niet ingevuld is.
        if($rol == "Docent" && $enquete == 0)
        {
            // verwijst naar de enquete_controller
            redirect('enquete_controller','refresh');
        }
        else
        {
            $this -> session -> unset_userdata('logged_in');
            session_destroy();
            redirect('login', 'refresh');
        }
    }

    /*
     * @Author: Marnix
     * Date: 18/05/2016
     * Controleerd of de sessie gedaan is, indien het gedaan is komt er een alert
     */
    function checkSession()
    {
        if (!$this -> session -> userdata('logged_in')) {
            echo "<script>alert('U sessie is verlopen!');</script>";
            redirect('login', 'refresh');
        }
    }
}

<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User: britt & Tim
 * Date: 3/05/2016
 * modified 10/05
 * User: marnix
 */
// Alleen na login beschikbaar
 //nodig voor de sessie te onthouden (wordt automatisch gestopt na 1 min
// session_start();
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->model('ticket_model', '', TRUE);
    }

    function index()
    {
            $this ->checkSession();
            $session_data = $this->session->userdata('logged_in');
            $data['userID'] = $session_data['userID'];
            $userID = $session_data['userID'];
            $rol = $this->user_model->neem_rol($userID);

            // Op basis van de rol de juiste view meegeven
            switch ($rol){
                case "Admin":
                    $data = array('userID' => $session_data['userID'], 'users' => $this->user_model->get_users());
                    $this->load->view('Layout/header');
                    $this->load->view('Layout/navigation');
                    $this->load->view('/Admin/admin_view',$data);
                    $this->load->view('Layout/footer');
                    break;
                case "Dispatcher":
                    $data =  array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getAllTickets());
                    $this->load->view('Layout/header');
                    $this->load->view('Layout/navigation');
                    $this->load->view('/Dispatcher/index', $data);
                    $this->load->view('Layout/footer');

                    break;
                case "Werkman":
                    $data =  array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getAllTickets());
                    $this->load->view('Layout/header');
                    $this->load->view('Layout/navigation');
                    $this->load->view('/Werkman/index');
                    $this->load->view('/Tickets/lijst_tickets', $data);
                    $this->load->view('Layout/footer');
                    break;
                case "Docent":
                    $data = array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getAllTickets());
                    $this->load->view('Layout/header');
                    $this->load->view('Layout/navigation');
                    $this->load->view('user_view', $data);
                    $this->load->view('Layout/footer');
                    break;
                default:
                    $this->load->view('login_view');
                    break;
            }

    }

    function logout()
    {
        $session_data = $this->session->userdata('logged_in');
        $userID = $session_data['userID'];
        $rol = $this->user_model->neem_rol($userID);

        // @Author: Britt
        if($rol == "Docent")
        {
            // verwijst naar de enquete_controller
            redirect('enquete_controller','refresh');
        }
        else
        {
            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('login', 'refresh');
        }

    }
    function checkSession(){
        if (!$this->session->userdata('logged_in')) {
            echo "<script>alert('U sessie is verlopen!');</script>";
            redirect('login', 'refresh');

        }
    }
}

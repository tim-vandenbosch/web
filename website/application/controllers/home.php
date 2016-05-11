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
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['userID'] = $session_data['userID'];
            $userID = $session_data['userID'];
            $rol = $this->user_model->neem_rol($userID);

            switch ($rol){
                case "Admin":
                    $this->load->view('admin_view',$data);
                    break;
                case "Dispatcher":
                    $this->load->view('dispatcher_view', $data);
                    break;
                case "Werkman":
                    $this->load->view('werkman_view', $data);
                    break;
                case "Docent":
                    $data = array('userID' => $session_data['userID'],
                        'tickets' => $this->ticket_model->getUserTickets($userID), $rol);
                    $this->load->view('user_view', $data);
                    break;
                default:
                    $this->load->view('home_view', $data);
                    break;
            }
        } else {
            // Als sessie niet bestaat of verlopen is
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    function test(){
        $rol = $this->user_model->neem_rol(2);
        echo $rol;
        var_dump($rol);
    }
}

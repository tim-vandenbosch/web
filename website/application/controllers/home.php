<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User: britt & Tim
 * Date: 3/05/2016
 */
// Alleen na login beschikbaar
 //nodig voor de sessie te onthouden (wordt automatisch gestopt na 1 min
// session_start();
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('ticket', '', TRUE);
    }

    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['userID'] = $session_data['userID'];
            $userID = $session_data['userId'];
            //Hier komt de pagina
            // Deze werkt wel
            //$this->load->view('user_view',$data);
            //$email1 = $this->input->post('userID');
            $rol = $this->user->neem_rol('userID');
            //switch werkt niet
            switch ($rol) {
                //voert enkel eerste uit maar niet meer default 
                case 0:
                    $this->load->view('admin_view', $data);
                    break;
                case 1:
                    $this->load->view('dispatcher_view', $data);
                    break;
                case 2:
                    $data = array('userID' => $session_data['userID'],
                        'tickets' => $this->ticket->getUserTickets($userID));
                    $this->load->view('user_view', $data);
                    break;
                case 3:
                    $this->load->view('werkman_view', $data);
                    break;
                default:
                    $this->load->view('home_view', $data);
                    break;
            }
            /* code onafgewerkt
            switch (rol) {
                case 'Admin':
                    $this->load->view('admin_view');
                    break;
                case 'Werkman':
                    break;
                case 'Dispatcher':
                    break;
                case'Docent':
                    break;
                default:
                    break;
            } */
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
}

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
    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['email']=$session_data['email'];
            //Hier komt de pagina
            $this->load->view('user_view',$data);
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
        }
        else
        {
            // Als sessie niet bestaat of verlopen is
            redirect('login','refresh');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home','refresh');
    }
}
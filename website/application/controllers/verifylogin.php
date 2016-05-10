<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User: britt & Tim
 * Date: 3/05/2016
 */
class Verifylogin extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','',TRUE);
    }
    
    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('login_view');
        }
        else
        {
            redirect('home','refresh');
        }
    }
    
    function check_database($password)
    {
        $email = $this->input->post('email');
        $result = $this->user_model->login($email,$password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array('userID' => $row->userID, 'email' => $row->email);
                $this->session->set_userdata('logged_in',$sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Het emailadres en wachtwoord komen niet overeen');
            return false;
        }
    }
}
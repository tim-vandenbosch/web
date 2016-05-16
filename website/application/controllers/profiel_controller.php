<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 10/05/2016
 * Time: 15:35
 */
class profiel_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
// @author =  Nida
    function index()
    {

            $session_data = $this->session->userdata('logged_in');
            $data['userID'] = $session_data['userID'];


        // Specfieke methode oproepen vanuit een model

        $this->load->model('user_model');
        $user = (array) $this->user_model->get_user_by_id($data['userID']);

        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('profiel_view',$user);
        $this->load->view('footer');
    }
    function aanvraagNewPw(){
        $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('nida.ilyas@student.pxl.be');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();
    }
}
<?php
/**
 * Gebruiker: Britt
 * Datum: 15/05/2016
 * Bron: /
 */
class enquete_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('enquete_model', '', TRUE);
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['userID'] = $session_data['userID'];
        $userID = $session_data['userID'];
        $data = array('userID' => $session_data['userID'], 'vragen' => $this->enquete_model->get_vragen());
        
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('user_enquete_view',$data);
        $this->load->view('footer');
    }
    
}
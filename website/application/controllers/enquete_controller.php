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
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('user_enquete_view');
        $this->load->view('footer');
    }
    
}
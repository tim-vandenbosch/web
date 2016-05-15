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

    function index()
    {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('profiel_view');
        $this->load->view('footer');
    }
}
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User: britt & Tim
 * Date: 13/05/2016
 */
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('Admin/admin_view');
    }
    
    function bewerken()
    {
        $this->load->view('Admin/bewerking_user_view');
    }
}
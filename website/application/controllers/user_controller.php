<?php
/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 5/05/2016
 * Time: 22:56
 */
class User_controller extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('ticket_model', '', TRUE);

    }

    function index(){
        $this->load->view('Layout/header');
        $this->load->view('Layout/navigation');
        $this->load->view('user_view');
        $this->load->view('Layout/footer');
    }

}
?>
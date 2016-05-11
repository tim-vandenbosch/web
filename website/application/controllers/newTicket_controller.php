<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 10/05/2016
 * Time: 15:14
 */
class newTicket_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ticket_model', '', TRUE);

    }

    function index()
    {
        $this->load->view('newTicket_view',$data = array('test'=>5,
    }
}
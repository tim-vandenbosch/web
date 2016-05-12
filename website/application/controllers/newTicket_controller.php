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
        $ticketId = $this-> ticket_model ->getLastTicketId()[0]->ticketID;
        $this -> load -> library('form_validation');


        $this ->form_validation -> set_rules('onderwerp','onderwerp','required');
        $this ->form_validation -> set_rules('lokaal','lokaal','required');
        $this->load->view('newTicket_view',$data = array('ticket' => $ticketId));


    }
}
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
        $this -> load -> library('form_validation');



    }

    function index()
    {
        $ticketId = $this-> ticket_model ->getLastTicketId()[0]->ticketID;
        $this->form_check();
        $this->load->view('newTicket_view',$data = array('ticket' => $ticketId));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('newTicket_view');
        }
        else
        {
            $this->load->view('newTicketSucces_view');
        }


    }
    function form_check(){

        $this ->form_validation -> set_rules('onderwerp','onderwerp','required');
        $this ->form_validation -> set_rules('lokaal','lokaal','required');

    }
}
<?php
/**
 * Created by PhpStorm.
 * Date: 17/05/2016
 * Time: 14:36
 */
class ticket_controller  extends CI_Controller
{
    // @author =  Nida
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('ticket_model');
        $this->load->model('user_model');
    }

    function details($ticketID){
        $data['query'] = $this-> ticket_model ->getdetailsTicket($ticketID);

        /*
        $data['werkmannen'] = $this -> user_model -> getEmailWerkmannen();
        $data['werkmanEmail'] = $this ->  ticket_model -> getWerkman($ticketID);

        $data['stat'] = $this-> ticket_model ->getEnums("'status'");
        $data['prio'] = $this-> ticket_model ->getEnums("'prioriteit'");
        */

        $this->load->view('Layout/header');
        $this->load->view('Layout/navigation');
        $this->load->view('/Tickets/details', $data);
        $this->load->view('Layout/footer');

    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 10/05/2016
 * Time: 15:14
 * @author= marnix
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
        $this -> sendForm();
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('newTicket_view',$data = array('ticket' => $ticketId));
            $this->load->view('footer');
        }
        else
        {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('newTicketSucces_view');
            $this->load->view('footer');
        }


    }
    function form_check(){

        $this ->form_validation -> set_rules('onderwerp','onderwerp','required|max_length[20]');
        $this ->form_validation -> set_rules('lokaal','lokaal','required|max_length[20]');
    }

    function sendForm(){
        $session_data = $this->session->userdata('logged_in');
        $aanmaker = $this -> session -> userdata('userId');


        $data = array(
            'ticketId'=>$this -> input -> post('ticketID'),
            'aanmaker' => $aanmaker,
            'onderwerp' =>$this -> input -> post('onderwerp'),
            'prioriteit' => $this -> input -> post('prioriteit'),
            'type' => $this -> input -> post('type'),
            'campusId' => $this -> input -> post('campusId'),
            'blokId' => $this -> input -> post('blokId'),
            'lokaalNummer' => $this -> input -> post('lokaalNummer'),
            'datum' => date("Y/m/d"),
            'omschrijving' => $this -> input -> post('omschrijving'),
            'bijlage' => $this -> input -> post('bijlage'),
            'herstellingDatum' => null,
            'deadline' => null,
            'hersteller' =>null,
            "status" => "In behandeling"
            );

        $this -> ticket_model -> insertTicket($data);
    }
}
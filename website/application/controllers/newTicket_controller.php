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
        $this -> load -> library('form_validation');
        $this->load->model('ticket_model', '', TRUE);

    }

    function index()
    {
        if ($this->session->userdata('logged_in')) {

            $this->formRules();

        $ticketId = $this-> ticket_model ->getLastTicketId()[0]->ticketID +1;
        $data= array(

        );
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Layout/header');
            $this->load->view('Layout/navigation');
            $this->load->view('newTicket_view',$data = array('ticket' => $ticketId));
            $this->load->view('Layout/footer');
        }
        else
        {

            $this -> sendForm($ticketId);
            $this->load->view('Layout/header');
            $this->load->view('Layout/navigation');
            $this->load->view('newTicketSucces_view');
            $this->load->view('Layout/footer');
        }
        } else {
            // Als sessie niet bestaat of verlopen is
            redirect('login', 'refresh');
        }


    }
    function formRules(){
        $this ->form_validation -> set_rules('onderwerp','onderwerp','required|max_length[20]');
        $this ->form_validation -> set_rules('type','type','required');
        $this ->form_validation -> set_rules('prior','prioriteit','required');
        $this ->form_validation -> set_rules('blokId','blokId','required');
        $this ->form_validation -> set_rules('lokaal','lokaal','required|max_length[20]');
        $this ->form_validation -> set_rules('omschrijving','omschrijving','required');
        $this ->form_validation -> set_rules('foto','foto');

    }

    function sendForm($ticketId){
        $session_data = $this->session->userdata('logged_in');
        $aanmaker = $session_data['userID'];

        $data = array(
            'ticketId'=>$ticketId,
            'aanmaker' => $aanmaker,
            'onderwerp' =>$this -> input -> post('onderwerp'),
            'prioriteit' => $this -> input -> post('prior'),
            'type' => $this -> input -> post('type'),
            'campusId' => $this -> input -> post('campusId'),
            'blokId' => $this -> input -> post('blokId'),
            'lokaalNummer' => $this -> input -> post('lokaal'),
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
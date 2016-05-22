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
        // $this -> load -> library('form_validation');
        $this->load->model('ticket_model', '', TRUE);
        $this->load->model('lokaal_model', '', TRUE);

    }

    function index()
    {
        $this->checkSession();

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

    }
    function formRules(){
        $this ->form_validation -> set_rules('onderwerp','onderwerp','required|max_length[20]');
        $this ->form_validation -> set_rules('type','type','required|callback_checkSession');
        $this ->form_validation -> set_rules('prior','prioriteit','required');
        $this ->form_validation -> set_rules('blokId','blokId','required');
        $this ->form_validation -> set_rules('lokaal','lokaal','required|max_length[3]|callback_checkLokaal');
        $this ->form_validation -> set_rules('omschrijving','omschrijving','required');
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

    //@author=marnix
    // check of user nog in gelogd is, zoniet opnieuw inloggen
    function checkSession(){
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
    //@author=marnix
    //date 19/05
    //deze functie check of het lokaal bestaat in deze blok
    function checkLokaal($lokaal){

        $blokId = $this -> lokaal_model ->checkLokaalExists($lokaal);
        //dit doe ik omdat blokId null kan zijn er dan errors geeft(0 is geen geldig blok id bij ons)
        if($blokId==null){
            $blokId=0;
        }else{
            $blokId = $blokId[0]->blokID;
        }

        $newticketBlokId = $this -> input ->post('blokId');
        if($blokId==$newticketBlokId){
            return true;
        }else{
            $this->form_validation->set_message('checkLokaal', 'Dit lokaal bestaat niet in deze blok,indien wel gelieve dit te melden aan de IT beheerder');
            return false;
        }

    }
}
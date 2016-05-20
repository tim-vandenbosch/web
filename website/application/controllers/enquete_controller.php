<?php
/**
 * Gebruiker: Britt
 * Datum: 15/05/2016
 * Bron: /
 */
class enquete_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('enquete_model', '', TRUE);
        $this->load->library('form_validation');
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['userID'] = $session_data['userID'];
        $userID = $session_data['userID'];
        $data = array('userID' => $session_data['userID'], 'vragen' => $this->enquete_model->get_vragen());

        $this->load->view('Layout/header');
        $this->load->view('Layout/navigation');
        $this->load->view('user_enquete_view', $data);
        $this->load->view('Layout/footer');

        /*
        $this->form_validation->set_rules('vraag1', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('Gelieve alles in te vullen');
        }
        else
        {
            $this->afmelden_verzenden();
        }*/

    }

    // Gebruiker: Britt
    // Datum: 18/05/2016
    // Het afmelden van de docent voltooien en de gegevens verzenden
    function afmelden_verzenden()
    {
        $ingevulde_antwoorden = array
        (
            "vraag1" => $this -> input -> post(''),
            "vraag2" => $this -> input -> post(''),
            "vraag3" => $this -> input -> post('')
        );
        //voeg_antwoord moet nog een vraagid krijgen en antwoord van die vraag
        $this->enquete_model->voeg_antwoord();
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
}
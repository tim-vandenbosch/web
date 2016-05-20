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
        // $this->load->library('form_validation');
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
    }
    // Gebruiker: Britt
    // Datum: 20/05/2016

    function  validatie()
    {
        $this -> form_validation -> set_rules('vraag1','Vraag1', 'required');
        $this -> form_validation -> set_rules('vraag2','Vraag2', 'required');
        $this -> form_validation -> set_rules('vraag3','Vraag3', 'required');
        $this->form_validation->set_message('Gelieve alles in te vullen');
    }

    // Gebruiker: Britt
    // Datum: 18/05/2016
    // Het afmelden van de docent voltooien en de gegevens verzenden
    function verzenden()
    {
        //form geeft null (why?)
            $ingevulde_antwoorden = array
            (
                "antw1" => $this->input->post('vraag1'),
                "antw2" => $this->input->post('vraag2'),
                "antw3" => $this->input->post('vraag3')
            );
            
            for ($i = 1; $i < 4; $i++) {
                echo var_dump($ingevulde_antwoorden[$i-1]);
                   // $this->enquete_model->voeg_antwoord($i, $ingevulde_antwoorden[$i - 1]);

            }
    }

    function afmelden()
    {
        $this->verzenden();
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
}
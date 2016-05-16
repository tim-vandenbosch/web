<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 10/05/2016
 * Time: 15:35
 */
class profiel_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->model('ticket_model', '', TRUE);
    }
// @author =  Nida
    function index()
    {

            $session_data = $this->session->userdata('logged_in');
            $id['userID'] = $session_data['userID'];


        // Specfieke methode oproepen vanuit een model

        $this->load->model('user_model');
        $user = (array) $this->user_model->get_user_by_id($id['userID']);


        $tic =  array('userID' => $session_data['userID'], 'tickets' => $this->ticket_model->getUserTickets($id['userID']));

        $data = $tic + $user;
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('profiel_view',$data ); // merge 2 arrays
        $this->load->view('footer');

    }
    function aanvraagNewPw(){

    }
}
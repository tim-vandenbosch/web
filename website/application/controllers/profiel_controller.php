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
        $this->load->model('user_model');
    }
// @author =  Nida
    function index()
    {

            $session_data = $this->session->userdata('logged_in');
            $data['userID'] = $session_data['userID'];
            //$userID = $session_data['userID'];
            echo print_r($data);
        /*
        $data = array();
        //$data[userID] = $userID;
        $data[email]= $this-> user_model->get_user_by_id(3);
        echo $data[email];
*/

        // Specfieke methode oproepen vanuit een model

        $this->load->model('user_model');
        $user = (array) $this->user_model->get_user_by_id($data);
        echo print_r($user);


        /*
        $email = array_column($data, 'email');
        print_r($email);
        */

        $this->load->view('header');
        $this->load->view('navigation');
       // $this->load->view('profiel_view',$user);
        $this->load->view('footer');
    }
}
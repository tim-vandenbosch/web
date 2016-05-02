<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/**
	 * Gebruiker: Britt
	 * Date: 29/04/2016
	 * Bron: https://ellislab.com/codeigniter
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->view('General/login');
		$this->load->database();
		//model
		$this->load->model('login_model');
	}
/*
	public function index()
	{
        //krijg de ingegeven logingegevens en wachtwoord
		$username = $this->input->post("user");
		$password = $this->input->post("password");

		//php validatie
		$this->form_validation->set_rules("user", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if ($this->form_validation->run() == FALSE)
		{
			//mislukte validatie gaat terug naar login
            //Deze code wordt al bij login scherm gedaan, zou pas na de knop login moeten gebeuren (de if)
			//$this->load->view('General/login');
		}
		else
		{
			//validation wel gelukt
            if($this->input->post() == "Login"){
                //controlo user en passwoord
                $user_result = $this->login_model->get_user($username,$password);

                if($user_result > 0)
                {
                    //sessie variabelen
                    $sessiondata = array(
                        'username' => $username,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect("User/index");
                }
                else {
                    //laat de gebruiker weten dat het niet klopt
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('General/login');
                }
            } else
            {
                redirect("User/index");
            }
            }

	}
*/
}

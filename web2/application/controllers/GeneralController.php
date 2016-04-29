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
		$this->load->database();
		//model
		$this->load->model('login_model');


	}

	public function index()
	{
		$this->load->view('General/login');
		//krijg de ingegeven logingegevens en wachtwoord
		$username = $this->input->post("user");
		$password = $this->input->post("password");

		if($this->input->)

	}
}

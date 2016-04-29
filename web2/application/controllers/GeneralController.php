<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * Date: 26/04/2016
	 * Bron: https://ellislab.com/codeigniter
	 */
	public function index()
	{
		$this->load->view('General/index');
		$this->load->helper('url');
		/* $this -> form_validation->set_rules('user','Gebruiker','required');
		$this -> form_validation->set_rules('password','Wachtwoord','required');

		if ($this->form_validation->run() == FALSE)
		{
			// dit zijn test pagina's
			$this->load->view('TemplateHome');
		}
		else
		{
			//dit zijn test paginas's
			$this->load->view('welcome_message');
		}*/
	}
}

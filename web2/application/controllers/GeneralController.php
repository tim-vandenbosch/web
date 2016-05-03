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
		// $this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->view('General/login');
        // $this->load->library('form_validation');

		// $this->load->database();
		//model
		$this->load->model('login_model');
	}



	public function index()
	{
		/*
		$session = $this->session->userdata('isLogin');
		if ($session == FALSE) {
			redirect('General/login');
		} else {
			redirect('home');
		}
		*/
	}
	
	public function login_form(){
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
 		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view->view("General/login");
		} else{
			$username = $this->input->post('user');
			$password = $this->input->post('pwd');
			$cek = $this->login_model->neem_user($username,$password,1);
			if ($cek <> 0){
				$this->session->set_userdata('isLogin',TRUE);
				$this->session->set_userdata('username',$username);
				redirect('User/index');
			}else{
				?>
				<script>
					alert('Login niet correct, controleer je email en je passwoord');
					history.go(-1);
				</script>
				<?php
			}
		}
	}
}

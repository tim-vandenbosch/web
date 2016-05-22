<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author = Britt & Tim
 * Date = 13/05/2016
 */
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this -> load -> library('form_validation');
        $this -> load -> model('user_model', '', TRUE);
    }

    /*
     * Het tonen van de admin view
     */
    function admin_view()
    {
        $this -> checkSession();
        $this->load->view('Admin/admin_view');
    }
    
    /*
     * De geselecteerde user bewerken
     */
    function bewerkenView($userid, $k)
    {
        $this['query'] = $this -> user_model -> get_user_by_id($userid);
        $this->load->view('Admin/admin_edit');
        if($k == "update")
        {
            $data['message'] = "update user is geslaagd.";
        }
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('Admin/admin_edit');
        $this -> load -> view('Layout/footer');
    }
    
    function toevoegenView()
    {
        $this -> load -> view('Admin/admin_add');
    }

    /* @author = Marnix
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
}
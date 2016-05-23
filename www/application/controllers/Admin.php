<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author = Britt & Tim
 * Date = 13/05/2016
 */
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this -> load -> library('form_validation');
        $this -> load -> model('user_model');
    }

    /* @Author: Tim
     * TODO: Het tonen van de admin view.
     */
    function admin_view()
    {
        $this -> checkSession();
        $session_data = $this -> session ->  userdata('logged_in');
        $data = array('userID' => $session_data['userID'], 'users' => $this->user_model->get_users());
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigationAdmin');
        $this -> load -> view('Admin/admin_view', $data);
        $this -> load -> view('Layout/footer');
    }
    
    /* @Author: Tim
     * TODO: Het wijzigen van de status. ---------------------------------------->>>> DEZE FUNCTIE IS ONVOLLEDIG
    */
    function changeStatus($userID)
    {
        $user = array(
            'userID' => $userID,
            'active' => 1
        );
        $this -> user_model -> status($user);
    }

    /* @Author: Tim
     * Navigatie naar nieuw venster
     */
    function newUser()
    {
        $userID = $this -> user_model -> getLastUserID();
        $userID++;
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigationAdmin');
        $this -> load -> view('Admin/admin_add', $userID);
        $this -> load -> view('Layout/footer');
    }

    /* @author = Marnix
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this -> session -> userdata('logged_in'))
        {
            redirect('login', 'refresh');
        }
    }
}
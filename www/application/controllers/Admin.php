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
        $this -> checkSession();
        $this -> formRules();

        $userID = $this -> user_model -> getLastUserID()[0] -> userID +1;
        $data = array();

        if($this -> form_validation -> run() == FALSE)
        {
            $this -> load -> view('Layout/header');
            $this -> load -> view('Layout/navigationAdmin');
            $this -> load -> view('Admin/admin_add', $data = array('user' => $userID));
            $this -> load -> view('Layout/footer');
        }
        else
        {
            $this -> sendForm($userID);
            $this -> load -> view('Layout/header');
            $this -> load -> view('Layout/navigationAdmin');
            $this -> load -> view('Admin/newUserSucces_view');
            $this -> load -> view('Layout/footer');
        }
    }

    /* @author = Tim
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     * Al de formrules instellen
     */
    function formRules()
    {
        $this -> form_validation -> set_rules('email','email','required|max_length[20]');
        $this -> form_validation -> set_rules('rol','rol','required|callback_checkSession');
        $this -> form_validation -> set_rules('actief','actief','required');
    }

    /* @author=marnix
     * Updaten van de database met het niewe ticket
     */
    function sendForm($userID)
    {
        $randPass = $this -> randPass();
        $data = array(
            'userID' => $userID,
            'email' => $this -> input -> post('email'),
            'pws' => $randPass,
            'rol' => $this -> input -> post('rol'),
            'active' => $this -> input -> post('active'),
        );
        $this -> user_model -> addUser($data);
    }

    /* @Author: Tim
     * bron: http://stackoverflow.com/questions/6101956/generating-a-random-password-in-php
     */
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
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
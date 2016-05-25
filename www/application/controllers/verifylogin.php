<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @author = Britt & Tim
 * Date = 3/05/2016
 */
class Verifylogin extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> model('user_model','',TRUE);
    }

    /*
     * Zet codeigniter form validatie rules op de betreffende vakjes
     */
    function index()
    {
        $this -> form_validation -> set_rules('email','Email','required|valid_email');
        $this -> form_validation -> set_rules('password','Password','trim|required|callback_check_database|callback_checkActive');

        if($this -> form_validation -> run() == FALSE)
        {
            $this -> load -> view('login_view');
        }
        else
        {
            redirect('home','refresh');
        }
    }

    /*
     * Controle of het passwoord overeenkomt met het ingegeven passwoord
     */
    function check_database($password)
    {
        $email = $this -> input -> post('email');
        $result = $this -> user_model -> login($email,$password);

        if($result)
        {
            foreach($result as $row)
            {
                $sess_array = array('userID' => $row -> userID, 'email' => $row -> email);
                $this -> session -> set_userdata('logged_in',$sess_array);
            }
            return TRUE;
        }
        else
        {
            $this -> form_validation -> set_message('check_database', 'Het emailadres en wachtwoord komen niet overeen');
            return false;
        }
    }

    function checkActive($userID)
    {
        $email = $this -> input -> post('email');
        $active = $this -> user_model -> getStatusByEmail($email)[0] -> active;
        if($active == 1)
        {
            return true;
        }
        else
        {
            $this -> form_validation -> set_message('checkActive', 'Deze gebruiker is geblokkeerd, contacteer de admin');
            return false;
        }
    }
}
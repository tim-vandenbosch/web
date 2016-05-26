<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @author = Britt & Tim
 * Date = 3/05/2016
 * Laat de login view zien
 */
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigationLogin');
        $this -> load -> view('login_view');
        $this -> load -> view('Layout/footer');
    }
}
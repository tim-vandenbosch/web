<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 18:00
 */
class newTicket_controllerTests extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> library('unit_test');
    }
    /*
    * @author= marnix
    * testen of sessie nog in gelogd is
    */
    public function test_checkSessionLoggedOut(){
        $CI = & get_instance();
        $CI -> session -> email="testuser@pxl.be";
        $CI -> session -> loggedIn=false;
        $this -> request('GET',['newTicket_controller','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }

    /*
     * @author= marnix
     * testen of de functie checkLokaal werkt
     */
    public function test_checkLokaal()
    {
        //checken of het lokaal bestaat in deze blok, antwoord = bestaat niet
        $this -> unit -> run(checkLokaal(0),false,'HEt lokaal bestaat niet in deze blok');
        $this -> load -> view('Test/test_view');

    }
}
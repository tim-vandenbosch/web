<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 18:00
 */
class profiel_controllerTests extends CI_controller
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
        $this -> request('GET',['profiel_controller','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }

    /*
    * @author= marnix
    * testen van de check_database functie, deze check of het nieuwe wachtwoord hetzelfde is al de vorige
    */
    public function test_checkdatabase()
    {
        $CI = &get_instance();
        $CI -> session -> email="docent1@pxl.be";
        $CI -> session -> password=md5("pxl");
        $CI -> session -> loggedIn=true;
        $this -> unit -> run(check_database(md5("pxl")),false,"wachtwoord is hetzelfde");
        $this -> unit -> run(check_database(md5("pxl1")),true,"wachtwoord is niet hetzelfde");
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 18:02
 */
class WerkmanTests extends TestCase
{

    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSessionLoggedOut(){
        $CI = & get_instance();
        $CI -> session -> email="testuser@pxl.be";
        $CI -> session -> loggedIn=false;
        $this -> request('GET',['Werkman','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }
}
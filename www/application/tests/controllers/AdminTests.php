<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 17:59
 */
class AdminTests extends TestCase
{
    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSessionLoggedOut(){
        $CI = & get_instance();
        $CI -> session -> email="testuser@pxl.be";
        $CI -> session -> loggedIn=false;
        $this -> request('GET',['Admin','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }
}
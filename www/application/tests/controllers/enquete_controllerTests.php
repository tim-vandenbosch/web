<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 17:59
 */
class enquete_controllerTests extends TestCase
{

    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSessionLoggedOut(){
        $CI = & get_instance();
        $CI -> session -> username="testUser";
        $CI -> session -> loggedIn=false;
        $this -> request('GET',['enquete_controller','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }
}
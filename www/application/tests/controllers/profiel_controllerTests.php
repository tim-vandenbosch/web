<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 18:00
 */
class profiel_controllerTests extends TestCase
{
    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSessionLoggedOut(){
        $CI = & get_instance();
        $CI -> session -> username="testUser";
        $CI -> session -> loggedIn=false;
        $this -> request('GET',['profiel_controller','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }
}
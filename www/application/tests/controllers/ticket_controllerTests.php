<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 18:01
 */
class ticket_controllerTests extends TestCase
{

    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSession(){
        $CI = & get_instance();
        $CI -> session -> loggedIn=True;

    }
}
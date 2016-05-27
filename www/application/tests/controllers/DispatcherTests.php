<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 26/05/2016
 * Time: 16:11
 */

require_once 'Dispatcher.php';

class DispatcherTests extends TestCase
{
    public  $test;
    public function setup()
    {
       $this -> test = new Dispatcher();
    }

    public function testDetails(){
        $details = $this -> test -> details(5,'niks');
        $this->assertTrue($details == 5);
        $this -> load -> view('Test/test_view');

    }

    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSession(){
        $CI = & get_instance();
        $CI -> session -> loggedIn=True;

    }
}
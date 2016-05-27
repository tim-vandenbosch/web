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
    /* @author = Daniela
     * Date = 27/05/2016
     * Bron =
     * Uitleg functie
     */
    public function setup()
    {
       $this -> test = new Dispatcher();
    }

    /* @author = Daniela
     * Date = 27/5/2016
     * Bron =
     * Uitleg functie
     */
    public function testDetails(){
        $details = $this -> test -> details(5,'niks');
        $this->assertTrue($details == 5);
        $this -> load -> view('Test/test_view');

    }

    /*
 * @author= marnix
 * testen of sessie nog in gelogd is
 */
    public function test_checkSessionLoggedOut(){
        $CI = & get_instance();
        $CI -> session -> email="testuser@pxl.be";
        $CI -> session -> loggedIn=false;
        $this -> request('GET',['Dispatcher','checkSession']);
        $this -> assertRedirect('login/refresh',302);

    }
}
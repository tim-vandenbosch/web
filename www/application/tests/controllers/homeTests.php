<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 26/05/2016
 * Time: 14:43
 */
class homeTests extends TestCase
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> library('unit_test');
    }

    function index()
    {
        $this -> unit -> run('lala','lala');
        $this -> load -> view('Test/test_view');
    }

    /*
     * @author=marnix
     * testen wat er gebeurt als er geen functie gevonden wordt
     */
    public function test_nosuchmethod_404()
    {
        $this -> request('GET',['home','nosuchmethod']);
        $this -> assertResponseCode(404);
    }

    /*
     * @author= marnix
     * testen of een user ingelogd is
     */
    public function test_userloggedIn()
    {
        $CI = & get_instance();
        $CI -> session -> username="testUser";
        $CI -> session -> type= "docent";
        $CI -> session -> loggedIn=True;
        $output = $this -> request('GET', ['home','index']);
        $this -> assertContains('<h1>home</h1>',$output);
    }
    /*
    * @author= marnix
    * testen als een user niet ingelogd is
    */
    public function test_userNotloggedIn()
    {
        $output = $this -> request('GET', ['home','index']);
        $this -> assertContains('<h1>home</h1>',$output);
    }

    /*
     * @author=marnix
     * redirect testen
     */
    public function test_redirectNotLoggedIn()
    {
        $this -> request('GET',['home','checkSession']);
        $this -> assertRedirect('login/refresh',302);
    }
}

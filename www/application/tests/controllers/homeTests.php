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


}

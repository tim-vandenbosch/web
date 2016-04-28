<?php

/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 28/04/2016
 * Time: 12:04
 */
class user_model extends CI_Model
{
    var $userID ="";
    var $email="";
    var $pws="";
    var $rol="";
    var $active="";

    function __construct()
    {
        parent::__construct();
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 28/04/2016
 * Time: 12:18
 */
class enquete_model extends CI_Model
{
    var $vragenlijstID="";
    var $userID="";
    var $vraag1="";
    var $vraag2="";
    var $vraag3="";
    function __construct()
    {
        parent::__construct();
    }
}
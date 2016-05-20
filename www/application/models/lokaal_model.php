<?php

/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 28/04/2016
 * Time: 12:10
 */
Class Lokaal_model extends CI_Model{

    // @author =  Marnix
    //date 19/05
    //checkt of lokaal bestaat en zo ja returned blokId
    function checkLokaalExists($lokaal){
        $this -> db -> select('blokID');
        $this -> db -> where('lokaalNummer',$lokaal);
        $query = $this -> db -> get('lokalen');
        if( $query ->num_rows() >0){
            return $query->result();
        }else{
            return false;
        }
    }
}
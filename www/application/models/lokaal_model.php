<?php
Class Lokaal_model extends CI_Model{
    /* @author =  Marnix
     * Date = 19/05/2016
     * checkt of lokaal bestaat en zo ja returned blokId
     */
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
<?php
/* @author = Nida Ilyas
 * Date = 28/04/2016
 */
class campus_model
{
    var $campusID = "";
    var $naam="";
    
    function __construct()
    {
        parent::__construct();
    }

/*    function getAllCampussen(){

        $query = $this -> db -> get('campussen');

        // Als er tickets gevonden worden in de db
        if($query -> num_rows() >= 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }*/
}
<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 09/05/2016
 * Time: 09:48
 */
Class Ticket extends CI_Model{

    function getUserTickets($userId){

        $query = $this -> db -> get_where('tickets',array('aanmaker'=>$userId));

        // Als er tickets gevonden worden in de db
        if($query -> num_rows() >= 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 09/05/2016
 * Time: 09:48
 */
Class Ticket extends CI_Model{

    function getTicketArray($userID){

        $this -> db -> select('*');
        $this -> db -> from('tickets');
        $this -> db -> where('aanmaker',$userID);

        $query = $this -> db -> get();

        // Als er geen tickets gevonden worden in de db
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 09/05/2016
 * Time: 09:48
 */
Class Ticket extends CI_Model{

    function getUserTickets($userID){

        $this -> db -> select('ticketID,onderwerp,prioriteit,type,campusID,blokID,lokaalNummer,herstellingsDatum,status');
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
    function getAllTickets(){

        $query = $this -> db -> get('tickets');

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
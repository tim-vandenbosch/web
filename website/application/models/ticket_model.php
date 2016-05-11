<?php

/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 28/04/2016
 * Time: 12:13
 */
class ticket_model
{

        function getAll()
        {
                $query = $this->db->get('tickets');
                return $query->result();
                return $query->result();
                return $query->result();
        }

        function getList()
        {
                $query = $this->db->get('tickets');
                return $query->result_array();
                /**return $query = $this->db->get('tickets');**/
        }



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

    function getLastTicketId(){
        $this -> db -> select_max('ticketID');
        $this -> db -> limit(1);
        $query = $this -> db -> get('tickets');

        // Als er ticket gevonden worden in de db
        if($query -> num_rows() ==1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }


}
<?php
    /**
     * Created by PhpStorm.
     * User: Marnix_laptop
     * Date: 09/05/2016
     * Time: 09:48
     */
Class Ticket_model extends CI_Model{

    function getUserTickets($userID){

        $this -> db -> select('ticketID,onderwerp,prioriteit,type,campusID,blokID,lokaalNummer,herstellingDatum,status');
        $this -> db -> from('tickets');
        $this -> db -> where('aanmaker',$userID);
        $query = $this -> db -> get();
        // Als er geen tickets gevonden worden in de db
        if($query -> num_rows() >= 1)
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

    //functie om te enums uit de database te halen en in een string array te zetten
    //geef een string mee tss " " en de naam van de kolom tussen ' '
    //vb voor statussen : getEnums("'status'") of prioriteiten : getEnums("'prioriteit'")
     function getEnums($kolom){
        $query = $this->db->query(" SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tickets' AND COLUMN_NAME = $kolom ");
        foreach ($query->result() as $row)
        {
            //echo $row->COLUMN_TYPE;

            $tussenstap1=  substr($row->COLUMN_TYPE,5);
            $tussenstap2  =  substr($tussenstap1, 0, -1);
            $tussenstap3 = str_replace("'", "", $tussenstap2);
            $stringarrayenums  = explode(',', $tussenstap3);

            /*    foreach($statussen as &$stat){ //om te testen
                    echo "<br>";
                    echo "<br>";
                    echo  $stat;
            }*/ //was om te testen 

        }
        return $stringarrayenums;
    }


    function sorttable($tablename){
                //$sql = "SELECT * FROM MyTable";
        $sql = $this->db->get('tickets');


        if (($tablename == 'id')
        {
            $sql .= " ORDER BY ticketID";
        }
        elseif (($tablename  == 'onderwerp')
        {
            $sql .= " ORDER BY onderwerp";
        }
        elseif (($tablename == 'prioriteit')
        {
            $sql .= " ORDER BY prioriteit";
        }
        elseif(($tablename == 'type')
        {
            $sql .= " ORDER BY type";
        }

        return $sql->result();;
    }
}
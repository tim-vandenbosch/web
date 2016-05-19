<?php
    /**
     * Created by PhpStorm.
     * User: Marnix_laptop
     * Date: 09/05/2016
     * Time: 09:48
     */
Class Ticket_model extends CI_Model{

    // @author =  Marnix
    function getUserTickets($userID){

        $this -> db -> select('t.ticketID,t.onderwerp,t.prioriteit,t.type,c.naam,b.blokLetter,t.lokaalNummer,t.herstellingDatum,t.status');
        $this -> db -> from('tickets as t');
        $this -> db -> join('campussen as c','t.campusID=c.campusID');
        $this -> db -> join('blokken as b','t.blokID=b.blokID');
        $this -> db -> where('t.aanmaker',$userID);
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

    //@author = nida
    function getTicketsByWm($userID){

        $this -> db -> select('*');
        $this -> db -> from('tickets as t');
        $this -> db -> join('campussen as c','t.campusID=c.campusID');
        $this -> db -> join('blokken as b','t.blokID=b.blokID');
        $this -> db -> where('t.hersteller',$userID);
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

    // @author =  Marnix
    function getAllTickets(){

        $this -> db -> select('t.ticketID,t.onderwerp,t.prioriteit,t.type,c.naam,b.blokLetter,t.lokaalNummer,t.herstellingDatum,t.status');
        $this -> db -> from('tickets as t');
        $this -> db -> join('campussen as c','t.campusID=c.campusID');
        $this -> db -> join('blokken as b','t.blokID=b.blokID');

        $query = $this -> db -> get();

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

    //@author = marnix
    function  getdetailsTicket($ticketID){


        $this -> db -> select('t.ticketID,t.aanmaker,u.email,t.onderwerp,t.prioriteit,t.type,c.naam,b.blokLetter,t.lokaalNummer,t.datum,t.omschrijving,t.herstellingDatum,t.deadline, t.hersteller,t.status');
        $this -> db -> from('tickets as t');
        $this -> db -> join('campussen as c','t.campusID=c.campusID');
        $this -> db -> join('blokken as b','t.blokID=b.blokID');
        $this -> db -> join('users as u','t.aanmaker=u.userID');
        $this -> db -> where('t.ticketID',$ticketID);
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



    // @author =  Nida
    function getList()
    {
        $query = $this->db->get('tickets');
        return $query->result_array();
        /**return $query = $this->db->get('tickets');**/
    }

    // @author =  Marnix
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

    // @author = Marnix
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


// @author =  Daniela
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
    //@author= nida
    function  getWerkman($ticketID){

        $this -> db -> select('u.email');
        $this -> db -> from('tickets as t');
        $this -> db -> join('users as u','t.hersteller=u.userID');
        $this -> db -> where('t.ticketID',$ticketID);
        $query = $this -> db -> get();

        // Als er geen tickets gevonden worden in de db
        if($query -> num_rows() >= 1)
        {
           // return $query->result();
            foreach ($query->result() as $row)
            {
                return $row;
            }
        }
        else
        {
            return false;
        }

    }
    //@author = marnix
    function insertTicket($ticket){

        $this -> db -> insert('tickets',$ticket);
    }

    //@author = marnix
    function updateTicket($ticket){
        $this -> db -> where('ticketID',$ticket['ticketId']);
        $this -> db -> update('tickets',$ticket);
    }




    /*// @author =  Daniela
        function sorttable($tablename){
                    //$sql = "SELECT * FROM MyTable";
            $sql = $this->db->get('tickets');
    $tablename = 'ticketId';

            if ($tablename == 'ticketId')
            {
                $sql .= " ORDER BY ticketID";
            }
            elseif ($tablename  == 'onderwerp')
            {
                $sql .= " ORDER BY onderwerp";
            }
            elseif ($tablename == 'prioriteit')
            {
                $sql .= " ORDER BY prioriteit";
            }
            elseif ($tablename == 'type')
            {
                $sql .= " ORDER BY type";
            }

            return $sql->result();
        }*/

    //Bron : http://stackoverflow.com/questions/3489783/how-to-sort-rows-of-html-table-that-are-called-from-mysql 
}
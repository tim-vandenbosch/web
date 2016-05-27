<?php
Class Ticket_model extends CI_Model{
    /* @author = Marnix
     * Date = 09/05/2016
     * Ophalen van alles tickets voor de user adhv userID
     */
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


            return FALSE;
        }
    }

    /* @author = Nida Ilyas
     * Ophalen van tickets voor een werkman adhv zijn userID
     */
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
            return FALSE;
        }
    }

    /* @author = Marnix
     * Ophalen alle tickets los van Id
     */
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
            return FALSE;
        }
    }

    /* @author = Marnix
     */
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
            return $query -> result();
        }
        else
        {
            return FALSE;
        }
    }

    /* @author = Nida Ilyas
     * alle tickets uit de database uithalen, en als een list teruggeven.
     */
    function getList()
    {
        $query = $this -> db -> get('tickets');
        return $query -> result_array();
        /**return $query = $this->db->get('tickets');**/
    }

    /* @author = Marnix
     * haalt laatste ticket ID op
     */
    function getLastTicketId(){
        $this -> db -> select_max('ticketID');
        $this -> db -> limit(1);
        $query = $this -> db -> get('tickets');

        // Als er ticket gevonden worden in de db
        if($query -> num_rows() ==1)
        {
            return $query -> result();
        }
        else
        {
            return FALSE;
        }
    }

    /* @author = Daniela
     * Functie om te enums uit de database te halen en in een string array te zetten
     * geef een string mee tss " " en de naam van de kolom tussen ' '
     * vb voor statussen : getEnums("'status'") of prioriteiten : getEnums("'prioriteit'")
     * Bron : http://stackoverflow.com/questions/2350052/how-can-i-get-enum-possible-values-in-a-mysql-database
     */
     function getEnums($kolom){
        $query = $this -> db -> query(" SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tickets' AND COLUMN_NAME = $kolom ");
        foreach ($query -> result() as $row)
        {
            $tussenstap1=  substr($row->COLUMN_TYPE,5);
            $tussenstap2  =  substr($tussenstap1, 0, -1);
            $tussenstap3 = str_replace("'", "", $tussenstap2);
            $stringarrayenums  = explode(',', $tussenstap3);

        }
        return $stringarrayenums;
    }

    /* @author= Daniela Lupo
     * *
     * Uitleg functie: Geeft de email van de werkman van een bepaalde ticket.
     */
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
            foreach ($query -> result() as $row)
            {
                return $row;
            }
        }
        else
        {
            return FALSE;
        }
    }

    /* @author = Marnix
    * Date = datum
     *  Bron =
     * insert nieuwe ticket
     */
    function insertTicket($ticket){

        $this -> db -> insert('tickets',$ticket);
    }

    /* @author = Marnix
     * Date = datum
     *  Bron =
     * update ticket adhv zijn ticket ID
     */
    function updateTicket($ticket){
        $this -> db -> where('ticketID',$ticket['ticketId']);
        $this -> db -> update('tickets',$ticket);
    }

    /* @author = Nida
     * Date = datum
     * Bron =
     * Uitleg functie: deze functie dient er om een ticket te verwijderen vanuit de database.
     */
    function deleteTicket($ticket){
        $this -> db -> where('ticketID',$ticket);
        $this -> db -> delete('tickets');
    }
}
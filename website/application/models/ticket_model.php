<?php

/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 28/04/2016
 * Time: 12:13
 */
class ticket_model
{
        var $ticketID = "";
        var $aanmaker = "";
        var $onderwerp = "";
        var $prioriteit = "";
        var $type = "";
        var $campusID = "";
        var $blokID = "";
        var $lokaalNummer = "";
        var $datum = "";
        var $omschrijving = "";
        var $bijlage = "";
        var $herstellingDatum;
        var $deadline = "";
        var $hersteller = "";
        var $status = "";

        /*
        function __construct()
        {
            parent::__construct();
        }
    */


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

        /**
         * function get_content(){
         * $this->db->select('omschrijving');
         * $this->db->from('tickets');
         * $query = $this->db->get();
         *
         * return $result = $query->result();
         * }
         * **/
}
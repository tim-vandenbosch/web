<?php

/**
 * Gebruiker: nida ilyas & Britt
 * Datum: 28/04/2016
 * Bron: /
 */
class enquete_model extends CI_Model
{
    /*
     * nida ilyas
     var $vragenlijstID="";
    var $userID="";
    var $vraag1="";
    var $vraag2="";
    var $vraag3="";


    function __construct()
    {
        parent::__construct();
    }
    */

    function get_vragen()
    {
        $this->db->select('vragenID, vraag_text, antw1_text, antw2_text, antw3_text, antw4_text');
        $this->db->from('vragen');

        $query = $this->db->get();
        return $query->result();
    }

    /*function get_antwoorden($vraagID)
    {
        $this->db->select('antw1_text,antw2_text,antw3_text,antw4_text');
        $this->db->from('vragen');
        $this->db->where('vragenID',$vraagID);

        $query = $this->db->get();
        return $query->row();
    } */

    function voeg_antwoord($vraagID, $antwoord)
    {
        $data = array
        (
           'vraagID' => $vraagID,
            'antwoord_text' => $antwoord
        );

        $this->db->insert('antwoorden',$data);
    }
}
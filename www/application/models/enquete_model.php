<?php

/* @author = Britt
 * Date = 28/04/2016
 */
class enquete_model extends CI_Model
{
    /*
     * Neemt alle vragen met antwoord uit de db
     */
    function get_vragen()
    {
        $this -> db -> select('vragenID, vraag_text, antw1_text, antw2_text, antw3_text, antw4_text');
        $this -> db -> from('vragen');

        $query = $this -> db -> get();
        return $query -> result();
    }

    /*function get_antwoorden($vraagID)
    {
        $this->db->select('antw1_text,antw2_text,antw3_text,antw4_text');
        $this->db->from('vragen');
        $this->db->where('vragenID',$vraagID);

        $query = $this->db->get();
        return $query->row();
    } */

    /*
     * Voegt de ingegeven antwoorden met bijpassende vraagID naar de db (antwoorden)
     */
    function voeg_antwoord($vraagID, $antwoord)
    {
        $id = $this -> db -> insert_id();
        $data = array
        (
           'vraagID' => $vraagID,
            'antwoord_text' => $antwoord
        );

        $this -> db -> insert('antwoorden',$data);
    }

    /*
     * De enquetebool inzetten naar 1 ==> want de enquete is ingevuld
     */
    function enquete_ingevuld($userID, $bool)
    {
        $this -> db -> set('enqueteBool', $bool);
        $this -> db -> where('userID',$userID);
        $this -> db -> update('users');

    }
}
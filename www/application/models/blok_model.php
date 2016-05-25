<?php
/* @author = Daniela
 * Date = 25/05/2016
 */
class blok_model extends CI_Model
{
    /* @author = Daniela
     * Date = 25/05/2016
     * Bron = geen bron gebruikt
     * functie die alle blokken haalt uit de tabel
     */
    function getAllBlokken()
    {
        $this->db->select('blokID,campusID,blokLetter');
        $this->db->from('blokken');

        $query = $this->db->get();

        // Als er tickets gevonden worden in de db
        if ($query->num_rows() >= 1) {

            return $query->result();

        } else {

            return false;
        }
    }

}
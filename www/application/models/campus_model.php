<?php
/* @author = Daniela Lupo
 *  * Date = 25/05/2016
 */
Class campus_model extends CI_Model
{
    /* @author = Daniela
     * Date = 25/05/2016
     * Bron = geen bron gebruikt
     * functie die alle campussen haalt uit de tabel
     */
    function getAllCampussen()
    {
        $this->db->select('naam,campusID');
        $this->db->from('campussen');

        $query = $this->db->get();

        // Als er tickets gevonden worden in de db
        if ($query->num_rows() >= 1) {

            return $query->result();

        } else {

            return false;
        }
    }

}
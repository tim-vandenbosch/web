<?php
/* @author = Daniela Lupo
 *  * Date = 25/05/2016

 * Date = 28/04/2016
 */
Class campus_model extends CI_Model
{

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
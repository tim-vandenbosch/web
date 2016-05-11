<?php
/**
 * User: britt & Tim
 * Date: 3/05/2016
 */
Class User_model extends CI_Model
{
    function login($email,$password)
    {
        $this->db->select('userID, email, pws');
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('pws',MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        // Als de gebruiker gevonden wordt in de db
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    function neem_rol($email)
    {
        $this->db->select('rol');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();

        // Als de gebruiker gevonden wordt in de db
        if($query -> num_rows() == 1)
        {
            return $query->row()->rol;
        }
        else
        {
            return false;
        }
    }
}

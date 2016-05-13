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

    function neem_rol($userID)
    {
        $this->db->select('rol');
        $this->db->from('users');
        $this->db->where('userID', $userID);
        $this->db->limit(1);

        $query = $this->db->get();
        $result = $query->row();
        return $result->rol;

        // Als de gebruiker gevonden wordt in de db
        if($query -> num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    function get_users()
    {
        $this->db->select('userID , email, rol, active');
        $this->db->from('users');

        $query = $this->db->get();

        return $query->result();
    }
    
    function get_user_by_rol($rol)
    {
        $this->db->select('userID, email, rol, active');
        $this->db->from('users');
        $this->db->where('rol', $rol);
        
        $query = this->db->get();
        $result = $query->row();
        
        return $result;
    }
    
    function get_user_by_active($active)
    {
        $this->db->select('userID, email, rol, active');
        $this->db->from('users');
        $this->db->where('active', $active);
        
        $query = this->db->get();
        $result = $query->row();
        
        return $result;
    }
}

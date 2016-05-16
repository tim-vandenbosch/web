<?php
/**
 * User: britt & Tim
 * Date: 3/05/2016
 */
Class User_model extends CI_Model
{
    // @author =  Britt & Tim
//@reviewer = Tim?
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

// @author =  Britt?
//@reviewer =
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

    // @author =  Britt
//@reviewer =
    function get_users()
    {
        $this->db->select('userID , email, rol, active');
        $this->db->from('users');
        // Deze lijn zou er voor moeten zorgen dat er geordend word op id
        $this->db->orderby('userID');

        $query = $this->db->get();

        return $query->result();
    }

    // @author =
//@reviewer =
    /*
    * Deze functie haalt alle users op met een bepaalde rol.
    */
    function get_user_by_rol($rol)
    {
        $this->db->select('userID, email, rol, active');
        $this->db->from('users');
        $this->db->where('rol', $rol);
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result;
    }

    // @author =
//@reviewer =
    /*
    * Deze functie haalt alle users op die actief zijn of niet.
    */
    function get_user_by_active($active)
    {
        $this->db->select('userID, email, rol, active');
        $this->db->from('users');
        $this->db->where('active', $active);
        
        $query = $this->db->get();
        $result = $query->row();
        
        return $result;
    }
    
    /*
    * Deze functie is gekopieerd en aangepast van Daniela, voor users.
    */
    // @author =  Tim
//@reviewer =
/*    function sorttable($tablename)
    {
        $sql = $this->db->get('users');
        
        if ($tablename == 'userID')
        {
            $sql .= " ORDER BY userID";
        }
        elseif ($tablename == 'eamil')
        {
            $sql .= " ORDER BY email";
        }
        elseif ($tablename == 'rol')
        {
            $sql .= " ORDER BY rol";
        }
        elsif ($tablename == 'active')
        {
            $sql .= " ORDER BY active";
        }
        return $sql->result();
    }*/


    // @author =  Nida
    function get_user_by_id($userID)
    {
        $this->db->select('userID, email, rol, active');
        $this->db->from('users');
        $this->db->where('userID', $userID);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
           }
//@author = Daniela
    function  getEmailWerkmannen(){

        $this -> db -> select('email');
        $this -> db -> from('users');
        $this -> db -> where('rol','Werkman');


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
}

<?php
Class User_model extends CI_Model
{
    /* @author =  Britt & Tim
     * Date = 3/05/2016
     * Bron: http://www.iluv2code.com/login-with-codeigniter-php.html
     * Er wordt uit de db het paswoord en user (als deze overeenkomen) gehaald, indien niet kan de user niet inloggen
     */
    function login($email,$password)
    {
        $this -> db -> select('userID, email, pws');
        $this -> db -> from('users');
        $this -> db -> where('email',$email);
        $this -> db -> where('pws',MD5($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        // Als de gebruiker gevonden wordt in de db
        if($query -> num_rows() == 1)
        {
            return $query -> result();
        }
        else
        {
            return false;
        }
    }

    /* @author = Britt
     * De rol van een user (de ingelogde user) wordt genomen uit db
     */
    function neem_rol($userID)
    {
        $this -> db -> select('rol');
        $this -> db -> from('users');
        $this -> db -> where('userID', $userID);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $result = $query -> row();
        return $result -> rol;
    }

    /* @author =  Marnix
     * Date = 
     * Neemt alle users en hun informatie voor in de sessie
     */
    function get_users()
    {
        $this -> db -> select('userID , email, rol, active');
        $this -> db -> from('users');
        // Deze lijn zou er voor moeten zorgen dat er geordend word op id
        // $this -> db -> orderby('userID');

        $query = $this -> db -> get();

        return $query -> result();
    }

    /* @author = Tim
     * Deze functie haalt alle users op met een bepaalde rol.
    */
    function get_user_by_rol($rol)
    {
        $this -> db -> select('userID, email, rol, active');
        $this -> db -> from('users');
        $this -> db -> where('rol', $rol);
        
        $query = $this -> db -> get();
        $result = $query -> row();
        
        return $result;
    }

    /* WIE HEEFT DEZE GEMAAKT?
     * Deze functie haalt alle users op die actief zijn of niet.
    */
    function get_user_by_active($active)
    {
        $this -> db -> select('userID, email, rol, active');
        $this -> db -> from('users');
        $this -> db -> where('active', $active);
        
        $query = $this -> db -> get();
        $result = $query -> row();
        
        return $result;
    }

    /* @author =  Nida Ilyas
     *
     * Deze functie dient om de een specfieke user uit de database te halen.
     * De $userId wordt mee gegeven.
     */
    function get_user_by_id($userID)
    {
        $this -> db -> select('userID, email, rol, active');
        $this -> db -> from('users');
        $this -> db -> where('userID', $userID);

        $query = $this -> db -> get();
        $result = $query -> row();
        return $result;
    }

    /* @author = Daniela
     * Date =
     * Deze functie dient om alle werkmannen uit de database uit te halen.
     * -> nodig voor de dispatcher: hersteller toekennen bij een ticket.
     */
    function  getWerkmannen(){

        $this -> db -> select('userID,email');
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

    /* @author = Britt
     * Date = 20/05/2016
     * neemt de waarde van docent uit db 1 = de enquete al ingevuld, 0 is nog niet
     */
    function check_enquete($userID)
    {
        $this -> db -> select('enqueteBool');
        $this -> db -> from('users');
        $this -> db -> where('userID', $userID);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $result = $query -> row();
        return $result -> enqueteBool;
    }

    /* @Author: Tim
     * Het ophalen van de active-status
     */
    function getStatus($userID)
    {
        $this -> db -> select('active');
        $this -> db -> from('users');
        $this -> db -> where('userID', $userID);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        $result = $query -> row();
        return $result -> active;
    }

    /* @author: Tim & Marnix
     * voor de login, checken of de gebruiker actief is of niet
     */
    function getStatusByEmail($email)
    {
        $this -> db -> select('active');
        $this -> db -> from('users');
        $this -> db -> where('email', $email);
        $this -> db -> limit(1);

        $query = $this -> db -> get();
        // als een status is gevonden
        if($query -> num_rows() ==1)
        {
            return $query -> result();
        }
        else
        {
            return false;
        }
    }

    /* @author: Tim
     * Deze functie is herleid van Marnix's ticket_model/updateTicket
     */
    function updateStatus($user)
    {
        $this -> db -> where('userID', $user['userID']);
        $this -> db -> update('users', $user);
    }

    /* @author: Tim
     * TODO: Deze functie geeft de laatste userID weer
     */
    function getLastUserID()
    {
        $this -> db -> select_max('userID');
        $this -> db -> limit(1);
        $query = $this -> db -> get('users');
        // Als er ticket gevonden worden in de db
        if($query -> num_rows() ==1)
        {
            return $query -> result();
        }
        else
        {
            return false;
        }
    }

    /* @Author: Tim
     * Deze functie verzorgt de input van een nieuwe gebruiker
     */
    function addUser($user)
    {
        $this -> db -> insert('users', $user);
    }
    
    function updateAccountPass($id, $npass){
        $data = array(
            'pws' => md5($npass)
                  );

        $this -> db -> where('userID', $id);
        $this -> db -> update('users', $data);
    }
}
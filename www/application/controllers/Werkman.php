<?php
/* @author =  Nida
 * Date = 5/05/2016
 */
class Werkman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> database();
        $this -> load -> model('ticket_model');
        $this -> load -> model('user_model');
    }
    /* @author: Nida
     * Deze function dient om de lijst te tonen van alle tickets, waarvoor de
     * ingelogde werkman toegekend is als hersteller.
     *
     * --> Wordt aangeroepen vanuit de view: '/Werkman/lijst_ticketsToDo'
     */
    function showTicketsToDo()
    {
        $this -> checkSession();
        $session_data = $this -> session -> userdata('logged_in');
        $data['userID'] = $session_data['userID'];
        $userID = $session_data['userID'];
        $rol = $this -> user_model -> neem_rol($userID);
        $data =  array('userID' => $session_data['userID'], 'tickets' => $this -> ticket_model -> getTicketsByWm($session_data['userID']));
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('/Werkman/lijst_ticketsToDo', $data);
        $this -> load -> view('Layout/footer');
    }


    /* @author: Nida
     * Deze function dient om de status aan te passen van een bepaalde ticket.
     * Alleen Werkman en een dispatcher kunnen de status aan passen.

     *
     * --> Wordt aangeroepen vanuit de view: '/Werkman/updateStatus_ticket'
     */
    function update($ticketID)
    {
        $data = array(
            // 'ticketId'=>$this -> input -> post('ticketID'),
            'ticketId'=> $ticketID,
            'status' => $this -> input -> post('dstatus')
        );

        $this -> ticket_model -> updateTicket($data);
        $this -> updateTicketStatus ($ticketID,"update");
        
    }

    /* @author: Nida
     * Deze function dient om de status aan te passen van een bepaalde ticket.
     * Alleen Werkman en een dispatcher kunnen de status aan passen.
     * Nadat de update van de status gelukt is, wordt er een medlding getoond.

     *
     * --> Wordt aangeroepen vanuit de view: '/Werkman/updateStatus_ticket'
     */
    function updateTicketStatus($ticketID,$k)
    {
        $data['message'] = "";
        // $this -> db ->join('campus'sen,'tickets.campusID=campussen.campusName');
        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $data['stat'] = $this -> ticket_model -> getEnums("'status'");

        if($k == "update")
        {
            $data['message'] = "Ticket update is geslaagd";
        }

        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('/Werkman/updateStatus_ticket', $data);
        $this -> load -> view('Layout/footer');
    }

    /* @author = Marnix
     * Check of user nog in gelogd is, zoniet opnieuw inloggen
     */
    function checkSession()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }
}
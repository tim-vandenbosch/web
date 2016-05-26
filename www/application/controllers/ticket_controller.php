<?php
/* @author =  Nida
 * Date = 17/05/2016
 */
class ticket_controller  extends CI_Controller
{
    /* @author =  Nida
     */
    function __construct()
    {
        parent::__construct();
        $this -> load -> database();
        $this -> load -> model('ticket_model');
        $this -> load ->model('user_model');
    }
    /* @author: Nida
     * Deze function dient om de details van een tickets te tonen.
     * In het geval van een validation failt, wordt er ook een gepaste melding getoond.
     *
     * --> Wordt aangeroepen vanuit de view: /Ticket/details
     */
    function details($ticketID)
    {
        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        /*
        $data['werkmannen'] = $this -> user_model -> getEmailWerkmannen();
        $data['werkmanEmail'] = $this ->  ticket_model -> getWerkman($ticketID);

        $data['stat'] = $this-> ticket_model ->getEnums("'status'");
        $data['prio'] = $this-> ticket_model ->getEnums("'prioriteit'");
        */

        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('/Tickets/details', $data);
        $this -> load -> view('Layout/footer');
    }


    /* @author: Nida
     * Deze function dient om de tickets aan te passen, die door de user zelf toegevoed zijn.
     *
     *
     * --> Wordt aangeroepen vanuit de view: profiel_view
     */
    function editOwnTicket($ticketID,$k)
    {
        $data['message'] = "";
        // $this -> db ->join('campus'sen,'tickets.campusID=campussen.campusName');
        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $data['prio'] = $this -> ticket_model -> getEnums("'prioriteit'");

        if($k == "update")
        {
            $data['message'] = "Ticket update is geslaagd";
        }

        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('/Tickets/edit_ticket', $data);
        $this -> load -> view('Layout/footer');
    }
    /* @author: Nida
     * Deze function dient om de aanpassingen van een ticket
     * naar de model te steuren, die door de user zelf toegevoed zijn.
     *
     * --> Wordt niet aangeroepen vanuit de view.
     * --> wordt gebruikt door: function editOwnTicket
     */
    function update($ticketID)
    {
        $data = array(
            // 'ticketId'=>$this -> input -> post('ticketID'),
            'ticketId'=> $ticketID,
            'prioriteit' => $this -> input -> post('dprioriteit'),
            'herstellingDatum' => $this -> input -> post('dherstellingsdatum'),
            'deadline' => $this -> input -> post('ddeadline'),
            'hersteller' => $this -> input -> post('dwerkman'),
            'status' => $this -> input -> post('dstatus')
        );
        $this -> ticket_model -> updateTicket($data);
        $this -> details($ticketID,"update");
    }

    /* @author: Nida
     * Deze function dient om de lijst te tonen van alle tickets.
     *
     * --> Wordt aangeroepen vanuit de view: /Tickets/lijst_tickets'
     */
    function showAllTickets(){
        $data =  array('tickets' => $this->ticket_model->getAllTickets());
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('/Werkman/index');
        $this -> load -> view('/Tickets/lijst_tickets', $data);
        $this -> load -> view('Layout/footer');
    }
    /* @author: Nida
     * Deze function dient om de tickets te verwijderen, die door de user zelf toegevoed zijn.
     *
     *
     * --> Wordt aangeroepen vanuit de view: profiel_view
     */
    function deleteticket($ticketid){
        $this -> ticket_model -> deleteTicket($ticketid);
        redirect(profiel_controller);
    }
}
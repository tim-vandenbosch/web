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
}
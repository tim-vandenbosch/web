<?php

/* @author = Daniela Carmelina
 * Date = 10/05/2016
 */
class Dispatcher  extends CI_Controller
{

    /* @author =  Nida
     */
    function __construct() {
        parent::__construct();
        $this -> checkSession();
        // $this -> load -> database();
        $this -> load -> model('ticket_model');
        $this -> load -> model('user_model');
    }
    
    /* @author =  Daniela
     */
    public function index()
    {

    }

    /* @author =  Daniela
     */
    public function details($ticketID,$k)
    {
        $data['message'] = "";
        // $this -> db ->join('campus'sen,'tickets.campusID=campussen.campusName');
        $data['query'] = $this -> ticket_model -> getdetailsTicket($ticketID);
        $data['werkmannen'] = $this -> user_model -> getWerkmannen();

        $data['werkmanEmail'] = $this ->  ticket_model -> getWerkman($ticketID);
        
        $data['stat'] = $this -> ticket_model -> getEnums("'status'");
        $data['prio'] = $this -> ticket_model -> getEnums("'prioriteit'");

        if($k == "update")
        {
            $data['message'] = "Ticket update is geslaagd";
        }
        $this -> load -> view('Layout/header');
        $this -> load -> view('Layout/navigation');
        $this -> load -> view('Dispatcher/details',$data);
        $this -> load -> view('Layout/footer');
    }

    /* @author = ?
     *
     */
    function update($ticketID){
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
        $this->details($ticketID,"update");
    }

    /* @author = ?
     */
    function getIdWerkman($email){
        
    }

    /* @author =  Daniela
     * Bron = https://www.formget.com/update-data-in-database-using-codeigniter/
     */
    function sort($tablename){
        $data = $this -> ticket_model -> sorttable($tablename);
        $this -> load -> view('/Dispatcher/index', $data);
       // return $data;
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
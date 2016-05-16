<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 12:32
 */
class Dispatcher  extends CI_Controller
{
    // @author =  Nida
//@reviewer = Daniela

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('ticket_model');
        $data['Dispatcher'] = $this;

    }

    // @author =  Daniela
//@reviewer =
    function settings(){

        $this->load->view('Dispatcher/settings');

    }
    // @author =  Daniela
//@reviewer =
    public function index()
    {
//        'userID' => $session_data['userID'],
        $data =  array( 'tickets' => $this->ticket_model->getAllTickets(), 'Dispatcher' => $this);
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('/Dispatcher/index', $data);
        $this->load->view('footer');
/*        $query = $this->db->query("SELECT * FROM tickets");
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            // $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;
//            $data[campusID]=$row->campusIDT;
        }
        $this->load->view('Dispatcher/index', $data);
        echo count($data);*/

        //Deze code in commentaar is eigenlijk niet nodig.....ma whatever ik laat het eventjes staan
        //je weet maar nooit :p
      /*  $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('footer');*/

    }
    /*    $query = $this->db->query("SELECT * FROM campussen");
         foreach ($query->result() as $row) {
             $data[campusID] = $row->campusID;
             if (campusIDT == campusID) {
                 $data['naam'] = $row->naam;
             }
         }*/

    // @author =  Daniela
//@reviewer =
    public function details($ticketID)
    {
       // $query = $this->db->query("SELECT * FROM tickets");
        $data['query'] = $this-> ticket_model ->getdetailsTicket($ticketID);
       // $this -> db ->join('campus'sen,'tickets.campusID=campussen.campusName');
/*        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;
            $data['datum']=$row->datum;
            $data['omschrijving']=$row->omschrijving;
            $data['Hdatum']=$row->herstellingDatum;
            $data['deadline']=$row->deadline;
            $data['hersteller']=$row->hersteller;
        }*/

        $data['stat'] = $this-> ticket_model ->getEnums("'status'");
        $data['prio'] = $this-> ticket_model ->getEnums("'prioriteit'");

        //$data['werkmannen'] = $this-> ticket_model ->getWerkmannen();
//        $data['stat'] =  $this->enumStatus();
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('Dispatcher/details',  $data);
        //$this->load->view('footer');

    }

    // @author =  Daniela
//@reviewer =
    function sort($tablename){
        $data = $this-> ticket_model ->sorttable($tablename);
        $this->load->view('/Dispatcher/index', $data);

       // return $data;
    }
/*    public function enumStatus(){
        $query = $this->db->query(" SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tickets' AND COLUMN_NAME = 'status' ");
        foreach ($query->result() as $row)
        {
            //echo $row->COLUMN_TYPE;

            $statussenstap1=  substr($row->COLUMN_TYPE,5);
            $statussenstap2  =  substr($statussenstap1, 0, -1);
            $statussenstap3 = str_replace("'", "", $statussenstap2);
            $statussen  = explode(',', $statussenstap3);

            /*    foreach($statussen as &$stat){ //om te testen
                    echo "<br>";
                    echo "<br>";
                    echo  $stat;
            }*/

    /*    }
        return $statussen;
    }*/

/*    public function proberen()
    {
        $data = $this->getAllTickets();
        $this->load->view('header');
        $this->load->view('Dispatcher/index', $data);
        $this->load->view('footer');
    }*/
/*    public function getAllTickets(){
        $query = $this->db->query("SELECT * FROM tickets");
        $data = array();
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            //  $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;

        }

        return $data;
    }*/
    //Ingeval dat het nodig zou zijn....laat ik het nog in comment staan  xD


}
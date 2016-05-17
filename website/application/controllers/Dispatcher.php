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
        $this->load->model('user_model');

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

    }

    // @author =  Daniela
//@reviewer =
    public function details($ticketID)
    {
        // $this -> db ->join('campus'sen,'tickets.campusID=campussen.campusName');
        $data['query'] = $this-> ticket_model ->getdetailsTicket($ticketID);
/*        //oude code
       // $query = $this->db->query("SELECT * FROM tickets");
        foreach ($query->result() as $row)
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
        }*/ //oude code
        $data['werkmannen'] = $this -> user_model -> getEmailWerkmannen();
        $data['werkmanEmail'] = $this ->  ticket_model -> getWerkman($ticketID);
        
        $data['stat'] = $this-> ticket_model ->getEnums("'status'");
        $data['prio'] = $this-> ticket_model ->getEnums("'prioriteit'");

        //$data['werkmannen'] = $this-> ticket_model ->getWerkmannen();
//        $data['stat'] =  $this->enumStatus();
        $this->load->view('Layout/header');
        $this->load->view('Layout/navigation');
        $this->load->view('Dispatcher/details',  $data);
        $this->load->view('Layout/footer');

    }

    // @author =  Daniela
//@reviewer =
    function sort($tablename){
        $data = $this-> ticket_model ->sorttable($tablename);
        $this->load->view('/Dispatcher/index', $data);

       // return $data;
    }


}
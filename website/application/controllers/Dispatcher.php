<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 12:32
 */
class Dispatcher  extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('ticket_model');
    }

    function settings(){

        $this->load->view('Dispatcher/settings');

    }
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
        $data['campussen'] = $this-> campus_model ->getAllCampussen();

        //Deze code in commentaar is eigenlijk niet nodig.....ma whatever ik laat het eventjes staan
        //je weet maar nooit :p
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('footer');

    }
    /*    $query = $this->db->query("SELECT * FROM campussen");
         foreach ($query->result() as $row) {
             $data[campusID] = $row->campusID;
             if (campusIDT == campusID) {
                 $data['naam'] = $row->naam;
             }
         }*/
    public function details()
    {
        $query = $this->db->query("SELECT * FROM tickets");

        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            // $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;
            $data['datum']=$row->datum;
            $data['omschrijving']=$row->omschrijving;
            $data['Hdatum']=$row->herstellingDatum;
            $data['deadline']=$row->deadline;
            $data['hersteller']=$row->hersteller;
        }

        $data['stat'] = $this-> ticket_model ->getEnums("'status'");
        $data['prio'] = $this-> ticket_model ->getEnums("'prioriteit'");

//        $data['stat'] =  $this->enumStatus();
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('Dispatcher/details',  $data);
        //$this->load->view('footer');

    }

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
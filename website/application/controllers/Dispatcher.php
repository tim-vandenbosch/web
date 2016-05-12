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
        $query = $this->db->query("SELECT * FROM tickets");
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            // $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
            $data['prioriteit']=$row->prioriteit;
            $data['status']=$row->status;
//            $data[campusID]=$row->campusIDT;
        }
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('Dispatcher/index', $data);
        $this->load->view('footer');

        echo count($data);
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

        }

        $data['stat'] =  $this->enumStatus();
        $this->load->view('header');
        $this->load->view('Dispatcher/details',  $data);
        $this->load->view('footer');

    }
    //'Geparkeerd','Afgesloten','In behandeling','Geannuleerd'

    /*    function get_enum_values( $table, $field )
        {
            $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
            preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
            $enum = explode("','", $matches[1]);
            return $enum;
        }*/
    public function enumStatus(){
        $query = $this->db->query(" SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tickets' AND COLUMN_NAME = 'status' ");
        foreach ($query->result() as $row)
        {
            echo $row->COLUMN_TYPE;

            $statussenstap1=  substr($row->COLUMN_TYPE,5);
            $statussenstap2  =  substr($statussenstap1, 0, -1);
            //$statussenstap3 = preg_replace(" ' ","",$statussenstap1);
            $statussen  = explode(',', $statussenstap2);

            /*    foreach($statussen as &$stat){ //om te testen
                    echo "<br>";
                    echo "<br>";
                    echo  $stat;
            }*/

        }
        return $statussen;
    }

    public function proberen()
    {
        $data = $this->getAllTickets();
        $this->load->view('header');
        $this->load->view('Dispatcher/index', $data);
        $this->load->view('footer');
    }
    public function getAllTickets(){
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
    }

}
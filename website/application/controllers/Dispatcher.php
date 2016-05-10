<?php

/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 4/05/2016
 * Time: 14:10
 */
class Dispatcher extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('ticket_model');
    }

    function index(){

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
        $this->load->view('Dispatcher/index', $data);
        $this->load->view('footer');

        echo count($data);
    }

    function changeTicket(){

        $this->load->view('Dispatcher/changeTicket');
    }



    function settings(){

        $this->load->view('Dispatcher/settings');

    }


    public function details()
    {
        /*  $query = $this->db->query("SELECT * FROM tickets");

          foreach ($query->result() as $row)
          {
              $data['onderwerp']= $row->onderwerp;
              // $data['aanmaakDatum']=$row->datum;
              $data['type']=$row->type;
              $data['prioriteit']=$row->prioriteit;
              $data['status']=$row->status;
  //            $data[campusID]=$row->campusIDT;
          }*/
//        $data['statussen']->get_enum_values(ticket_model, status);* /

        /*unset($arrayStatussen);
        $arrayStatussen = array ();
        $arrayStatussen = get_enum_values(ticket_model, status);*/
        $query = $this->db->query(" SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tickets' AND COLUMN_NAME = 'status' ");
        foreach ($query->result() as $row) {
            echo $row->COLUMN_TYPE;

            $statussenstap1 = substr($row->COLUMN_TYPE, 5);
            $statussenstap2 = substr($statussenstap1, 0, -1);
            //$statussenstap3 = preg_replace(" ' ","",$statussenstap1);
            $statussen = explode(',', $statussenstap2);
        }

        $datastat =  $statussen;
        $this->load->view('header');
        $this->load->view('Dispatcher/details', $datastat);
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

            /*    foreach($statussen as &$stat){
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

?>
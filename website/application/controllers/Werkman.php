<?php
/**
 * Created by PhpStorm.
 * User: nida ilyas
 * Date: 5/05/2016
 * Time: 22:56
 */
class Werkman extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('ticket_model');

    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM tickets");
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
        }
        //$this->load->view('user_view');


        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('Werkman/index', $data);
        $this->load->view('footer');

    }

    public function getAllTickets(){
        $query = $this->db->query("SELECT * FROM tickets");
        $data = array();
        foreach ($query->result() as $row)
        {
            $data['onderwerp']= $row->onderwerp;
            $data['aanmaakDatum']=$row->datum;
            $data['type']=$row->type;
        }

        return $data;
    }
    public function enumRols(){
        $rolArray = array();
        $query = $this->db->query(" SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'users' AND COLUMN_NAME = 'rol' ");
        foreach ($query->result() as $row)
        {
            // $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
            //echo $enumList;
            // echo $row->COLUMN_TYPE;
//string substr ( string $string , int $start [, int $length ] )

            $rolArray = substr($row->COLUMN_TYPE , 6 , 5  );

        }

        //$this->load->view('Werkman/edit_ticket', $rolArray);
        echo $rolArray;


    }
    public function prob(){

        $data = array(
        );
        $data[effe] = 'bla';

        $this->load->view('Werkman/edit_ticket',$data);
    }



}
?>
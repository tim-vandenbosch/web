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
        $this->load->model('user_model');
    }


/* Omdat dit niet mag
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
    */


    /*Dani is hiermee bezig
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
    */


}
?>
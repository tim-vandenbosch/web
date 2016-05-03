<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Britt Verschakelen
// 22/04/2016
// Bron
// http://www.kodingmadesimple.com/2014/08/how-to-create-login-form-codeigniter-mysql-twitter-bootstrap.html

class login_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //get the username & password from tbl_usrs
    function neem_user($usr, $pwd, $active)
    {
        /*$sql = "select * from users where username = '" . $usr . "' and password = '" . md5($pwd) . "' and active = '1'";
        $query = $this->db->query($sql);
        return $query->num_rows();*/

        $this->db->select('*');
        $this->db->from('users');
        //toekennnen variabelen
        $this->db->where('email',$usr);
        $this->db->where('pws',$pwd);
        $this->db->where('active',$active);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function userData($usr){
        $this->db->select('email');
        $this->db->select('name');
        $this->db->where('email',$usr);
        $query = $this->db->get('user');
        return $query->row();
    }
}?>
<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:47
 */
class lokaal_modelTests extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('lokaal_model');
        $this->model = $this->CI->lokaal_model;
        $this->load->library('unit_test');
    }
    
}
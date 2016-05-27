<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:48
 */
class werkman_modelTests extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('werkman_model');
        $this->model = $this->CI->werkman_model;
        $this->load->library('unit_test');

    }
}
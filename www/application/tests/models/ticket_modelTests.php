<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:48
 */
class ticket_modelTests extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('ticket_model');
        $this->model = $this->CI->ticket_model;
    }
}
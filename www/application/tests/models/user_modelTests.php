<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:48
 */
class user_modelTests extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('user_model');
        $this->model = $this->CI->user_model;
        $this->load->library('unit_test');

    }

    /* @author = Daniela
     * Date = 27/05/2016
     *
     * test: deze test dient om te controleren dat de function 'get_user_by_id' in model
     * een user als output terug geeft. En dat het niet leeg is.
    */
    public function test_get_user_by_id($userId){

        $result = $this -> model ->get_user_by_id($userId);
        $this->assertNotEmpty($result);
    }
}
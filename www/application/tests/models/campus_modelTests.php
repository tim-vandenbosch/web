<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:47
 */
class campus_modelTests extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('campus_model');
        $this->model = $this->CI->campus_model;
    }
    /*
     * @author=Nida
     * test: testen als er alle campussen worden uitgehaald vanuit de database.
     */
    public function test_getAllCampussen(){
        $expected = [
            0 => (object) ['campusID' => '1', 'naam' => 'Elfde Linie'],
            1 => (object) ['campusID' => '2', 'naam' => 'Guffenslaan'],
            2 => (object) ['campusID' => '3', 'naam' => 'Vildersstraat'],
            3 => (object) ['campusID' => '4', 'naam' => 'Quartier Canal'],
            4 => (object) ['campusID' => '5', 'naam' => 'Diepenbeek']
        ];
        $result = $this -> model -> getAllCampussen();

        for($i=0;$i<count($expected);$i++){
            $this -> assertEquals($result[$i]-> campusID,$expected[$i]->campusID);
            $this -> assertEquals($result[$i]-> naam,$expected[$i]->naam);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:47
 */
class enquete_modelTests extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('enquete_model');
        $this->model = $this->CI->enquete_model;
        $this->load->library('unit_test');

    }
    /* @author = Nida
     * Date = 27/05/2016
     *
     * test: deze test dient om te controleren dat de function 'get_vragen' in model
     * een lijst van vragen teruggeeft als output. En dat het niet leeg is.
     * Er wordt ook naar de juisthuis gecontroleerd.
     */
    public function test_get_vragen(){
    $expected = [
        0 =>(object) ['vragenID' => '1',
            'vraag_text' => 'Was alles duidelijk bij het ingeven van een probleem?',
            'antw1_text'=>'Ja', 'antw2_text'=>'Soms',
            'antw3_text'=>'Nee', 'antw4_text' =>''],


        1 =>(object) ['vragenID' => '2', 'vraag_text' => 'Wat vindt u van de interface?',
            'antw1_text'=>'Geweldig', 'antw2_text'=>'Duidelijk',
            'antw3_text'=>'Neutraal', 'antw4_text' =>'Kan beter'],


        2 =>(object) ['vragenID' => '3', 'vraag_text' => 'Heeft u nog andere opmerkingen?',
            'antw1_text'=>'', 'antw2_text'=>'',
            'antw3_text'=>'', 'antw4_text' =>''],

    ];


        $result = $this -> model -> get_vragen();

        for($i=0;$i<count($expected);$i++){
            $this -> assertEquals($result[$i]-> vragenID,$expected[$i]->vragenID);
            $this -> assertEquals($result[$i]-> vraag_text,$expected[$i]->vraag_text);


            $this -> assertEquals($result[$i]-> antw1_text,$expected[$i]->antw1_text);
            $this -> assertEquals($result[$i]-> antw2_text,$expected[$i]->antw2_text);
            $this -> assertEquals($result[$i]-> antw3_text,$expected[$i]->antw3_text);
            $this -> assertEquals($result[$i]-> antw4_text,$expected[$i]->antw4_text);
        }



    }

}
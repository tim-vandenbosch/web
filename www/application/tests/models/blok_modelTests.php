<?php
/**
 * Created by PhpStorm.
 * User: Marnix_laptop
 * Date: 27/05/2016
 * Time: 12:47
 */
class blok_modelTests extends TestCase
{
    public function setUp()
    {
        $this -> resetInstance();
        $this -> CI -> load -> model('blok_model');
        $this -> model = $this -> CI -> blok_model;
    }

    /*
     * @author=marnix
     * testen of alle blokken wordenopgehaald
     */
    public function test_getAllblokkken()
    {
        $expected = [
          0 =>(object) ['blokID' => '1', 'campusID' => '1','blokLetter'=>'A'],
          1 =>(object) ['blokID' => '2', 'campusID' => '1','blokLetter'=>'B'],
          2 =>(object) ['blokID' => '3', 'campusID' => '1','blokLetter'=>'D'],
          3 =>(object) ['blokID' => '4', 'campusID' => '1','blokLetter'=>'D']
        ];
        $result = $this -> model ->getAllBlokken();

        for($i=0;$i<count($expected);$i++){
            $this -> assertEquals($result[$i]-> blokID,$expected[$i]->blokID);
            $this -> assertEquals($result[$i]-> campusID,$expected[$i]->campusID);
            $this -> assertEquals($result[$i]-> blokLetter,$expected[$i]->blokLetter);
        }
    }
}
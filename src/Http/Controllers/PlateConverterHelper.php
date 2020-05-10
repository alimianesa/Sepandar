<?php


namespace Alimianesa\Sepandar\Http\Controllers;


class PlateConverterHelper
{
    public $examplePlate = "68و775IR44";

    protected $converter = [
        "الف" => "01", "ب"=>"02","پ"=>'03','ت'=>'04','ث'=>'05','ج'=>'06','د'=>'10','ز'=>'13','س'=>'15','ش'=>'16','ص'=>'17',
        'ط'=>'19','ع'=>'21','ف'=>'23','ق'=>'24','ک'=>'25','گ'=>'26','ل'=>'27','م'=>'28','ن'=>'29','و'=>'30','ه'=>'31',
        'ی'=>'32','‫معلولين‬'=>'33', '‫تشريفات‬'=>'34','C'=>'53','S'=>'69'
    ];

    /**
     * @param string $plate
     * @return int
     */
    public function plateToInt(string $plate):int
    {
        $final = substr($plate,0 ,2) . $this->converter[substr($plate , 2 ,2)]
            .substr($plate,4 ,3) . substr($plate,9 , 2);

        return $int =  (int) $final;
    }

    /**
     * @param int $convertedPlate
     * @return string
     */
    public function intToPlate(int $convertedPlate):string
    {
        $string = (string)$convertedPlate;

        return substr($string , 0 ,2) . array_search(substr($string , 2 ,2) , $this->converter)
            .substr($string , 4 ,3)."IR". substr($string, 7 ,2);
    }

}

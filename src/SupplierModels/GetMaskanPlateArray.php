<?php


namespace Alimianesa\Sepandar\SupplierModels;


class GetMaskanPlateArray
{
    protected array $getMaskanPlateArray;

    public function __construct(array $getMaskanPlateArray)
    {
        $this->getMaskanPlateArray = $getMaskanPlateArray;
    }

    public function getIndex($index):GetMaskanPlate
    {
        return $this->getMaskanPlateArray[$index];
    }

    public function push(GetMaskanPlate $getMaskanPlate)
    {
        array_push($this->getMaskanPlateArray, $getMaskanPlate);
    }
}

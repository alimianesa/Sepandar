<?php


namespace Alimianesa\Sepandar\SupplierModels;


class GetMaskanBillArray
{
    protected array $maskanBillArray;

    public function __construct($maskanBillArray)
    {
        $this->maskanBillArray =$maskanBillArray;
    }

    public function getIndex($index):GetMaskanBill
    {
        return $this->maskanBillArray[$index];
    }

    public function push(GetMaskanBill $getMaskanBill)
    {
        array_push($this->maskanBillArray, $getMaskanBill);
    }
}

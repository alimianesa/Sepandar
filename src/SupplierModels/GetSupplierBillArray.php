<?php


namespace Alimianesa\Sepandar\SupplierModels;


class GetSupplierBillArray
{
    protected array $supplierBill;


    public function __construct($supplierBill)
    {
        $this->supplierBill = $supplierBill;
    }

    public function getIndex($index):GetSupplierBill
    {
        return $this->supplierBill[$index];
    }

    public function push(GetSupplierBill $getSupplierBill)
    {
        array_push($this->supplierBill, $getSupplierBill);
    }

}

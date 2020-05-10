<?php


namespace Alimianesa\Sepandar\IssuerModels;


class GetIssuerCreditPaidBillArray
{
    protected array $issuerCreditPaidBillArray;

    public function __construct($issuerCreditPaidBillArray)
    {
        $this->issuerCreditPaidBillArray = $issuerCreditPaidBillArray;
    }

    public function getIndex($index):GetIssuerCreditPaidBill
    {
        return $this->issuerCreditPaidBillArray[$index];
    }

    public function push(GetIssuerCreditPaidBill $getIssuerCreditPaidBill)
    {
        array_push($this->issuerCreditPaidBillArray , $getIssuerCreditPaidBill);
    }
}

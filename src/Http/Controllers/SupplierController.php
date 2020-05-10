<?php

namespace Alimianesa\Sepandar\Http\Controllers;

use Alimianesa\Sepandar\BillAtomicGroupPay;
use Alimianesa\Sepandar\BillAtomicGroupPayArray;
use Alimianesa\Sepandar\BillGroupPay;
use Alimianesa\Sepandar\BillGroupPayArray;
use Alimianesa\Sepandar\SupplierModels\DeleteMaskanPlate;
use Alimianesa\Sepandar\SupplierModels\GetMaskanBill;
use Alimianesa\Sepandar\SupplierModels\GetMaskanBillArray;
use Alimianesa\Sepandar\SupplierModels\GetMaskanPlate;
use Alimianesa\Sepandar\SupplierModels\GetMaskanPlateArray;
use Alimianesa\Sepandar\SupplierModels\GetSupplierBill;
use Alimianesa\Sepandar\SupplierModels\GetSupplierBillArray;
use Alimianesa\Sepandar\SupplierModels\PutMaskanPlate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupplierController
{
    protected string $serviceAddress;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->serviceAddress = config("sepandar.ServiceAddress");
        $this->password = config("sepandar.password");
        $this->username = config("sepandar.username");
    }

    public function getMaskanBill(Request $request)
    {
        $response = [
            'startDate'=> $request->startDate,
            'endDate' => $request->endDate
        ];
        $maskanBills = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/supplier/maskan/bill" , $response)->json();

        if (isset($maskanBills['plateNumber'])) {
            $results = [];
            foreach ($maskanBills as $bill) {
                $maskanBill = new GetMaskanBill(
                    $bill['plateNumber'] ,
                    $bill['billId'] ,
                    $bill['amount'],
                    $bill['freeway'],
                    $bill['issueDate'],
                    $bill['traverseDate'],
                    $bill['eventId']
                );
                array_push($results, $maskanBill);
            }
            return new GetMaskanBillArray($results);
        } else {
            return $maskanBills;
        }
    }

    public function getMaskanPlate(Request $request)
    {
        $response = [
            'plateNumber'=> $request->plateNumber,
        ];
        $maskanBills = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/supplier/maskan/plate" , $response)->json();

        if (isset($maskanBills['startDate'])) {
            $results = [];
            foreach ($maskanBills as $bill) {
                $maskanBill = new GetMaskanPlate(
                    $bill['startDate'] ,
                    $bill['ednDate'] ,
                );
                array_push($results, $maskanBill);
            }
            return new GetMaskanPlateArray($results);
        } else {
            return $maskanBills;
        }
    }

    public function putMaskanPLate(Request $requests)
    {
        $request =json_decode($requests->getContent());
        $requestBody = [
            "plateNumber" => $request->plateNumber,
            "effectiveDate" => $request->effectiveDate,
        ];
        $putMaskanPlate =Http::withBasicAuth($this->username ,$this->password)->put(
            "https://{$this->serviceAddress}/api/supplier/maskan/plate",
            $requestBody)->json();

        return new PutMaskanPlate(
            $putMaskanPlate['code'],
            $putMaskanPlate['message']
        );
    }

    public function deleteMaskanPLate(Request $request)
    {
        $deleteMaskanPlate =Http::withBasicAuth($this->username ,$this->password)->delete(
            "https://{$this->serviceAddress}/api/supplier/maskan/plate?plateNumber=".
            $request->plateNumber."&&effectiveDate=".
            $request->effectiveDate,
            )
            ->json();

        return new DeleteMaskanPlate(
            $deleteMaskanPlate['code'],
            $deleteMaskanPlate['message']
        );
    }

    public function getSupplierBill(Request $request)
    {
        $response = [
            'startDate' => $request->startDate,
            'endDate' => $request->endDate
        ];

        $supplyBills = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/supplier/bill" , $response)->json();

        if (isset($supplyBills['plateNumber'])) {
            $results = [];
            foreach ($supplyBills as $payBill) {
                $paidModel = new GetSupplierBill(
                    $payBill['plateNumber'],
                    $payBill['billId'],
                    $payBill['amount'],
                    $payBill['freeway'],
                    $payBill['issueDate'],
                    $payBill['traverseDate'],
                    $payBill['eventId']
                );
                array_push($results, $paidModel);
            }
            return new GetSupplierBillArray($results);
        } else {
            return $supplyBills;
        }
    }

    public function putBillGroupPay(Request $requests)
    {
        $request =json_decode($requests->getContent());

        $putBillGroupPay =Http::withBasicAuth($this->username ,$this->password)->put(
            "https://{$this->serviceAddress}/api/bill/grouppay",
            $request)->json();
        $bills = [];
        foreach ($putBillGroupPay['bills'] as $billGroupPay) {
            $putBillGroup = new BillGroupPayArray(
                $billGroupPay['billId'],
                $billGroupPay['paidBillId'],
                $billGroupPay['paymentResult'],
                $billGroupPay['paymentDescription'],
            );
            array_push($bills,$putBillGroup);
        }

        return new BillGroupPay(
            $bills,
            $putBillGroupPay['paidBillsCount'],
            $putBillGroupPay['notPaidBillsCount'],
            $putBillGroupPay['totalPayment']
        );
    }

    public function putBillAtomicGroupPay(Request $requests)
    {
        $request =json_decode($requests->getContent());

        $putBillAtomicGroupPay =Http::withBasicAuth($this->username ,$this->password)->put(
            "https://{$this->serviceAddress}/api/bill/atomicgrouppay",
            $request)->json();
        if (isset($putBillAtomicGroupPay['bills'])) {
            $bills = [];
            foreach ($putBillAtomicGroupPay['bills'] as $billGroupPay) {
                $putBillGroup = new BillAtomicGroupPayArray(
                    $billGroupPay['billId'],
                    $billGroupPay['paidBillId'],
                );
                array_push($bills,$putBillGroup);
            }

            return new BillAtomicGroupPay(
                $bills,
                $putBillAtomicGroupPay['totalPayment']
            );
        } else {
            return $putBillAtomicGroupPay;
        }
    }

}


<?php

namespace Alimianesa\Sepandar\Http\Controllers;

use Alimianesa\Sepandar\BillDebtModel;
use Alimianesa\Sepandar\BillStatus;
use Alimianesa\Sepandar\BillTransModel;
use Alimianesa\Sepandar\PaidBillDetailModel;
use Alimianesa\Sepandar\PaidModel;
use Alimianesa\Sepandar\PaidModelArray;
use Alimianesa\Sepandar\PayBillModel;
use Alimianesa\Sepandar\PayModel;
use Alimianesa\Sepandar\PayModelArray;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BillingController
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

    public function getPaidBill(Request $request )
    {
        $response = [
            'plateNumber' => $request->plateNumber,
            'startDate'=> $request->startDate,
            'endDate' => $request->endDate
        ];

        $paidBills = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/bill/paid" , $response)->json();

        $results = [];
        foreach ($paidBills as $paidBill) {
            $paidModel = new PaidModel(
                $paidBill['paidBillId'] ,
                $paidBill['billId'] ,
                $paidBill['agentDesc'] ,
                $paidBill['paymentTypeDesc'],
                $paidBill['transId'],
                $paidBill['paymentDate'],
                $paidBill['amount']
            );
            array_push($results, $paidModel);
        }
        return new PaidModelArray($results);
    }

    public function getPayBill(Request $request )
    {
        $response = [
            'plateNumber' => $request->plateNumber
        ];

        $payBills = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/bill" , $response)->json();

        $results = [];
        foreach ($payBills as $payBill) {
            $paidModel = new PayModel(
                $payBill['billId'] ,
                $payBill['amount'] ,
                $payBill['freeway'],
                $payBill['issueDate'],
                $payBill['traverseDate'],
                $payBill['eventId']
            );
            array_push($results, $paidModel);
        }

        return new PayModelArray($results);
    }

    public function getBillStatus(Request $request)
    {
        $response = [
            'billId' => $request->billId
        ];
        $billState = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/bill/pay" , $response)->json();

        return new BillStatus(
            $billState['paymentStatus'] ,
            $billState['description'] ,
        );
    }

    public function payBill(Request $requests)
    {
        $request =json_decode($requests->getContent());
        $requestBody = [
            "amount" => $request->amount,
            "referenceCode" => $request->referenceCode,
        ];
        $payBill =Http::withBasicAuth($this->username ,$this->password)->put(
            "https://{$this->serviceAddress}/api/bill/pay?billId=".$requests->billId,
            $requestBody)->json();

        if (isset($payBill["paidBillId"])) {
            return new PayBillModel(
                $payBill['paidBillId'] ,
            );
        } else {
            return $payBill;
        }
    }

    public function getBillDebt(Request $request)
    {
        $billDebt = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/bill/debt" ,
                ["plateNumber" => $request->plateNumber])
            ->json();


        return new BillDebtModel(
            $billDebt["totalBill"]
        );
    }

    public function getBillPaidDetail(Request $request)
    {
        $billPaidDetails = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/bill/paid/detail" ,
                ["paidBillId" => $request->paidBillId])
            ->json();

        return new PaidBillDetailModel(
            $billPaidDetails["billId"],
            $billPaidDetails["transId"],
            $billPaidDetails["paymentTypeDescription"],
            $billPaidDetails["paymentDate"],
            $billPaidDetails["amount"],
            $billPaidDetails["plateNumber"],
            $billPaidDetails["plateClass"],
            $billPaidDetails["freeway"]
        );
    }

    public function getBillTrans(Request $request)
    {
        $getBillTrans = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/bill/trans" ,
                ["transId" => $request->transId])
            ->json();

        return new BillTransModel(
            $getBillTrans["transDate"],
            $getBillTrans["transTypeDescription"],
            $getBillTrans["amount"],
            $getBillTrans["billId"],
            $getBillTrans["referenceCode"],
        );
    }



}











<?php

namespace Alimianesa\Sepandar\Http\Controllers;

use Alimianesa\Sepandar\IssuerModels\DeleteIssuerWhitelist;
use Alimianesa\Sepandar\IssuerModels\GetIssuerCreditPaidBill;
use Alimianesa\Sepandar\IssuerModels\GetIssuerCreditPaidBillArray;
use Alimianesa\Sepandar\IssuerModels\IssuerWhitelistModel;
use Alimianesa\Sepandar\IssuerModels\IssuerWhitelistModelArray;
use Alimianesa\Sepandar\IssuerModels\PutIssuerWhitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IssuerController
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

    public function getIssuerWhitelist(Request $request)
    {
        $issueWhiteList = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/issuer/whitelist" ,
                [
                    "plateNumber" => $request->plateNumber,
                ])
            ->json();
        $results = [];
        foreach ($issueWhiteList as $issuerWhitelist) {
            $whitelist = new IssuerWhitelistModel(
                $issuerWhitelist["startDate"],
                $issuerWhitelist["endDate"]
            );
            array_push($results, $whitelist);
        }
        return new IssuerWhitelistModelArray($results);
    }

    public function putIssuerWhitelist(Request $requests)
    {
        $request =json_decode($requests->getContent());
        $requestBody = [
            "plateNumber" => $request->plateNumber,
            "effectiveDate" => $request->effectiveDate,
        ];
        $putIssuerWhitelist =Http::withBasicAuth($this->username ,$this->password)->put(
            "https://{$this->serviceAddress}/api/issuer/whitelist",
            $requestBody)->json();

        return new PutIssuerWhitelist(
            $putIssuerWhitelist['code'],
            $putIssuerWhitelist['message']
        );
    }

    public function deleteIssuerWhitelist(Request $request)
    {
        $putIssuerWhitelist =Http::withBasicAuth($this->username ,$this->password)->delete(
            "https://{$this->serviceAddress}/api/issuer/whitelist?plateNumber=".
                $request->plateNumber."&&effectiveDate=".
                $request->effectiveDate,
            )
            ->json();

        return new DeleteIssuerWhitelist(
            $putIssuerWhitelist['code'],
            $putIssuerWhitelist['message']
        );
    }

    public function getIssuerCreditPaidBill(Request $requests)
    {
        $request = [
            'startDate' => $requests->startDate,
            "endDate"   => $requests->endDate
        ];
        $issuerCreditPaidBill = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/issuer/credit/paidbill" , $request)->json();

        if (isset($issuerCreditPaidBill[0]["paidBillId"])) {
            $results = [];
            foreach ($issuerCreditPaidBill as $billPaidDetails) {
                $issuerCreditPaidBillModel = new GetIssuerCreditPaidBill(
                    $billPaidDetails["paidBillId"],
                    $billPaidDetails["billId"],
                    $billPaidDetails["transId"],
                    $billPaidDetails["paymentDate"],
                    $billPaidDetails["amount"],
                    $billPaidDetails["plateNumber"],
                    $billPaidDetails["plateClass"],
                    $billPaidDetails["freeway"]
                );
                array_push($results , $issuerCreditPaidBillModel);
            }
            return new GetIssuerCreditPaidBillArray($results);
        } else {
            return $issuerCreditPaidBill;
        }
    }

    public function getIssuerWhitelistPaidBill(Request $request)
    {
        $issuerWhitelistPaidBill = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/issuer/whitelist/paidbill?startDate="
                .$request->startDate."&endDate=". $request->endDate
            )
            ->json();
        if (isset($issuerWhitelistPaidBill[0]["paidBillId"])) {
            $results = [];
            foreach ($issuerWhitelistPaidBill as $billPaidDetails) {
                $issuerCreditPaidBillModel = new GetIssuerCreditPaidBill(
                    $billPaidDetails["paidBillId"],
                    $billPaidDetails["billId"],
                    $billPaidDetails["transId"],
                    $billPaidDetails["paymentDate"],
                    $billPaidDetails["amount"],
                    $billPaidDetails["plateNumber"],
                    $billPaidDetails["plateClass"],
                    $billPaidDetails["freeway"]
                );
                array_push($results , $issuerCreditPaidBillModel);
            }
            return new GetIssuerCreditPaidBillArray($results);
        } else {
            return $issuerWhitelistPaidBill;
        }

    }


}

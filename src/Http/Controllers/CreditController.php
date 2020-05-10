<?php

namespace Alimianesa\Sepandar\Http\Controllers;

use Alimianesa\Sepandar\CreditModels\CreditAmountModel;
use Alimianesa\Sepandar\CreditModels\CreditDecreaseAmountModel;
use Alimianesa\Sepandar\CreditModels\CreditIncreaseAmountModel;
use Alimianesa\Sepandar\CreditModels\CreditSelfDeclarationAmountModel;
use Alimianesa\Sepandar\CreditModels\CreditSelfDeclarationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreditController
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

    public function getCreditAmount(Request $request)
    {
        $creditAmount = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/credit/amount" ,
                ["plateNumber" => $request->plateNumber])
            ->json();
        if (isset($creditAmount['amount'])) {
            return new CreditAmountModel(
                $creditAmount['amount']
            );
        } else {
            return $creditAmount;
        }

    }

    public function creditIncreaseAmount(Request $requests)
    {
        $request =json_decode($requests->getContent());
        $increaseAmount = Http::withBasicAuth($this->username ,$this->password)
            ->post("https://{$this->serviceAddress}/api/credit/increaseamount" ,
                [
                    "plateNumber" => $request->plateNumber,
                    "amount" => $request->amount,
                    "referenceCode" => $request->referenceCode
                ])
            ->json();
        if (isset($increaseAmount['transId'])) {
            return new CreditIncreaseAmountModel(
                $increaseAmount['transId']
            );
        } else {
            return $increaseAmount;
        }
    }

    public function creditDecreaseAmount(Request $requests)
    {
        $request =json_decode($requests->getContent());

        $decreaseAmount = Http::withBasicAuth($this->username ,$this->password)
            ->post("https://{$this->serviceAddress}/api/credit/decreaseamount" ,
                [
                    "plateNumber" => $request->plateNumber,
                    "amount" => $request->amount,
                    "referenceCode" => $request->referenceCode
                ])
            ->json();
        if (isset($decreaseAmount['transId'])) {
            return new CreditDecreaseAmountModel(
                $decreaseAmount['transId']
            );
        } else {
            return $decreaseAmount;
        }
    }

    public function creditSelfDeclaration(Request $requests)
    {
        $request =json_decode($requests->getContent());

        $selfDeclaration = Http::withBasicAuth($this->username ,$this->password)
            ->post("https://{$this->serviceAddress}/api/credit/selfdeclaration" ,
                [
                    "plateNumber" => $request->plateNumber,
                    "amount" => $request->amount,
                    "referenceCode" => $request->referenceCode
                ])
            ->json();
        if (isset($selfDeclaration['transId'])) {
            return new CreditSelfDeclarationModel(
                $selfDeclaration['transId']
            );
        } else {
            return $selfDeclaration;
        }
    }

    public function creditSelfDeclarationAmount(Request $request)
    {
        $selfDeclarationAmount = Http::withBasicAuth($this->username ,$this->password)
            ->get("https://{$this->serviceAddress}/api/credit/selfdeclarationamount" ,
                ["plateNumber" => $request->plateNumber])
            ->json();
        if (isset($selfDeclarationAmount['amount'])) {
            return new CreditSelfDeclarationAmountModel(
                $selfDeclarationAmount['amount']
            );
        } else {
            return $selfDeclarationAmount;
        }
    }
}










<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/api/v1/alimianesa/test/functions', function (Request $request) {

    /**
     * test GetPaidBill
     */
    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
    return $billing->getPaidBill($request)->getIndex(0)->getAmount();

//
    /**
     * test GetPayBill
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
//    return $billing ->getPayBill($request)->getAmount() ;


    /**
     * test GetBillStatus
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
//    return $billing ->getBillStatus($request)->getDescription() ;


    /**
     * test PayBill
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
//    return $billing ->payBill($request);

    /**
     * test GetBillDebt
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
//    return $billing ->getBillDebt($request);

    /**
     * test GetBillPaidDetail
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
//    return $billing -> getBillPaidDetail($request)->getAmount();

    /**
     * test GetBillTrans
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\BillingController;
//    return $billing -> getBillTrans($request)->getBillId();


    /**
     * test GetCreditAmount
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\CreditController;
//    return $billing -> getCreditAmount($request)->getAmount();


    /**
     * test CreditIncreaseAmount
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\CreditController;
//    return $billing -> creditIncreaseAmount($request)->getTransId();

    /**
     * test CreditDecreaseAmount
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\CreditController;
//    return $billing -> creditDecreaseAmount($request)->getTransId();


    /**
     * test CreditSelfDeclaration
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\CreditController;
//    return $billing -> creditSelfDeclaration($request)->getTransId();

    /**
     * test CreditSelfDeclarationAmount
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\CreditController;
//    return $billing -> creditSelfDeclarationAmount($request)->getAmount();

    /**
     * test GetIssuerWhitelist
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\IssuerController;
//    return $billing -> getIssuerWhitelist($request)->getIndex(0)->getEndDate();

    /**
     * test PutIssuerWhitelist
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\IssuerController;
//    return $billing -> putIssuerWhitelist($request)->getMessage();

    /**
     * test DeleteIssuerWhitelist
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\IssuerController;
//    return $billing -> deleteIssuerWhitelist($request)->getMessage();

    /**
     * test GetMaskanBill
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> getMaskanBill($request);

    /**
     * test GetMaskanPlate
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> getMaskanPlate($request);

    /**
     * test PutMaskanPlate
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> getMaskanPlate($request)->getMessage();

    /**
     * test DeleteMaskanPlate
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> deleteMaskanPlate($request)->getMessage();

    /**
     * test GetSupplierBill
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> getSupplierBill($request);

    /**
     * test PutBillGroupPay
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> putBillGroupPay($request)->getBills();

    /**
     * test PutBillAtomicGroupPay
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\SupplierController();
//    return $billing -> putBillAtomicGroupPay($request);

    /**
     * test GetIssuerCreditPaidBill
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\IssuerController();
//    return $billing -> getIssuerCreditPaidBill($request)->getIndex(0)->getBillId();

    /**
     * test GetIssuerWhitelistPaidBill
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\IssuerController();
//    return $billing -> getIssuerWhitelistPaidBill($request)->getIndex(0)->getBillId();


    /**
     * test
     */
//    $billing = new Alimianesa\Sepandar\Http\Controllers\IssuerController();
//    return $billing -> getIssuerWhitelistPaidBill($request)->getIndex(0)->getBillId();
});


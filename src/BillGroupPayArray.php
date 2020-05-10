<?php


namespace Alimianesa\Sepandar;


use phpDocumentor\Reflection\Types\Nullable;

class BillGroupPayArray
{
    protected int $billId;
    protected $paidBillId;
    protected int $paymentResult;
    protected string $paymentDescription;

    public function __construct(
        int $billId ,
        $paidBillId,
        int $paymentResult,
        string $paymentDescription
    )
    {
        $this->setBillId($billId);
        $this->setPaidBillId($paidBillId);
        $this->setPaymentResult($paymentResult);
        $this->setPaymentDescription($paymentDescription);
    }

    /**
     * @return int
     */
    public function getBillId(): int
    {
        return $this->billId;
    }

    /**
     * @param int $billId
     */
    public function setBillId(int $billId): void
    {
        $this->billId = $billId;
    }

    /**
     * @return int
     */
    public function getPaidBillId()
    {
        return $this->paidBillId;
    }

    /**
     * @param $paidBillId
     */
    public function setPaidBillId($paidBillId)
    {
        $this->paidBillId = $paidBillId;
    }

    /**
     * @return int
     */
    public function getPaymentResult(): int
    {
        return $this->paymentResult;
    }

    /**
     * @param int $paymentResult
     */
    public function setPaymentResult(int $paymentResult): void
    {
        $this->paymentResult = $paymentResult;
    }

    /**
     * @return string
     */
    public function getPaymentDescription(): string
    {
        return $this->paymentDescription;
    }

    /**
     * @param string $paymentDescription
     */
    public function setPaymentDescription(string $paymentDescription): void
    {
        $this->paymentDescription = $paymentDescription;
    }
}

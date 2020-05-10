<?php

namespace Alimianesa\Sepandar;



class PaidModel
{
    protected string $agentDesc;
    protected int $paidBillId;
    protected int $billId;
    protected string $paymentTypeDesc;
    protected int $transId;
    protected int $amount;
    protected $paymentDate;

    public function __construct(
        int $paidBillId,
        int $billId,
        string $agentDesc,
        string $paymentTypeDesc,
        int $transId,
        $paymentDate,
        int $amount
    )
    {
        $this->setAgentDesc($agentDesc);
        $this->setPaidBillId($paidBillId);
        $this->setBillId($billId);
        $this->setPaymentTypeDesc($paymentTypeDesc);
        $this->setTransId($transId);
        $this->setAmount($amount);
        $this->setPaymentDate($paymentDate);
    }

    /**
     * @return string
     */
    public function getAgentDesc(): string
    {
        return $this->agentDesc;
    }

    /**
     * @param string $agentDesc
     */
    public function setAgentDesc(string $agentDesc): void
    {
        $this->agentDesc = $agentDesc;
    }

    /**
     * @return int
     */
    public function getPaidBillId(): int
    {
        return $this->paidBillId;
    }

    /**
     * @param int $paidBillId
     */
    public function setPaidBillId(int $paidBillId): void
    {
        $this->paidBillId = $paidBillId;
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
     * @return string
     */
    public function getPaymentTypeDesc(): string
    {
        return $this->paymentTypeDesc;
    }

    /**
     * @param string $paymentTypeDesc
     */
    public function setPaymentTypeDesc(string $paymentTypeDesc): void
    {
        $this->paymentTypeDesc = $paymentTypeDesc;
    }

    /**
     * @return int
     */
    public function getTransId(): int
    {
        return $this->transId;
    }

    /**
     * @param int $transId
     */
    public function setTransId(int $transId): void
    {
        $this->transId = $transId;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }


    public function getPaymentDate()
    {
        return $this->paymentDate;
    }


    public function setPaymentDate($paymentDate): void
    {
        $this->paymentDate = $paymentDate;
    }


}

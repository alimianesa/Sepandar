<?php


namespace Alimianesa\Sepandar;


class BillTransModel
{
    protected $transDate;
    protected string $transTypeDescription;
    protected int $amount;
    protected string $billId;
    protected string $referenceCode;

    public function __construct(
        $transDate,
        string $transTypeDescription,
        int $amount,
        string $billId,
        string $referenceCode
    )
    {
        $this->setTransDate($transDate);
        $this->setTransTypeDescription($transTypeDescription);
        $this->setAmount($amount);
        $this->setBillId($billId);
        $this->setReferenceCode($referenceCode);
    }

    /**
     * @return mixed
     */
    public function getTransDate()
    {
        return $this->transDate;
    }

    /**
     * @param mixed $transDate
     */
    public function setTransDate($transDate): void
    {
        $this->transDate = $transDate;
    }

    /**
     * @return string
     */
    public function getTransTypeDescription(): string
    {
        return $this->transTypeDescription;
    }

    /**
     * @param string $transTypeDescription
     */
    public function setTransTypeDescription(string $transTypeDescription): void
    {
        $this->transTypeDescription = $transTypeDescription;
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

    /**
     * @return int
     */
    public function getBillId()
    {
        return $this->billId;
    }

    /**
     * @param string $billId
     */
    public function setBillId(string $billId)
    {
        $this->billId = $billId;
    }

    /**
     * @return string
     */
    public function getReferenceCode(): string
    {
        return $this->referenceCode;
    }

    /**
     * @param string $referenceCode
     */
    public function setReferenceCode(string $referenceCode): void
    {
        $this->referenceCode = $referenceCode;
    }

}

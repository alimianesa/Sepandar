<?php


namespace Alimianesa\Sepandar;


class PaidBillDetailModel
{
    protected int $billId;
    protected int $transId;
    protected string $paymentTypeDescription;
    protected $paymentDate;
    protected int $amount;
    protected int $plateNumber;
    protected string $plateClass;
    protected string $freeway;

    public function __construct(
        int $billId ,
        int $transId,
        string $paymentTypeDescription,
        $paymentDate,
        int $amount,
        int $plateNumber,
        string $plateClass,
        string $freeway
    )
    {
        $this->setBillId($billId);
        $this->setTransId($transId);
        $this->setPaymentTypeDescription($paymentTypeDescription);
        $this->setPaymentDate($paymentDate);
        $this->setAmount($amount);
        $this->setPlateNumber($plateNumber);
        $this->setPlateClass($plateClass);
        $this->setFreeway($freeway);
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
     * @return string
     */
    public function getPaymentTypeDescription(): string
    {
        return $this->paymentTypeDescription;
    }

    /**
     * @param string $paymentTypeDescription
     */
    public function setPaymentTypeDescription(string $paymentTypeDescription): void
    {
        $this->paymentTypeDescription = $paymentTypeDescription;
    }

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param mixed $paymentDate
     */
    public function setPaymentDate($paymentDate): void
    {
        $this->paymentDate = $paymentDate;
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
    public function getPlateNumber(): int
    {
        return $this->plateNumber;
    }

    /**
     * @param int $plateNumber
     */
    public function setPlateNumber(int $plateNumber): void
    {
        $this->plateNumber = $plateNumber;
    }

    /**
     * @return string
     */
    public function getPlateClass(): string
    {
        return $this->plateClass;
    }

    /**
     * @param string $plateClass
     */
    public function setPlateClass(string $plateClass): void
    {
        $this->plateClass = $plateClass;
    }

    /**
     * @return string
     */
    public function getFreeway(): string
    {
        return $this->freeway;
    }

    /**
     * @param string $freeway
     */
    public function setFreeway(string $freeway): void
    {
        $this->freeway = $freeway;
    }

}

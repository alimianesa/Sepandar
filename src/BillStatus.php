<?php


namespace Alimianesa\Sepandar;


class BillStatus
{
    protected int $paymentStatus;
    protected string $description;

    public function __construct(int $paymentStatus , string $description)
    {
        $this->setDescription($description);
        $this->setPaymentStatus($paymentStatus);
    }

    /**
     * @return int
     */
    public function getPaymentStatus(): int
    {
        return $this->paymentStatus;
    }

    /**
     * @param int $paymentStatus
     */
    public function setPaymentStatus(int $paymentStatus): void
    {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}

<?php


namespace Alimianesa\Sepandar;


class BillGroupPay
{
    protected array $bills;
    protected int $paidBillsCount;
    protected int $notPaidBillsCount;
    protected int $totalPayment;

    public function __construct(
        array $bills ,
        int $paidBillsCount,
        int $notPaidBillsCount,
        int $totalPayment
    )
    {
        $this->setBills($bills);
        $this->setPaidBillsCount($paidBillsCount);
        $this->setNotPaidBillsCount($notPaidBillsCount);
        $this->setTotalPayment($totalPayment);
    }

    public function getBillsIndex($index):BillGroupPayArray
    {
        return $this->bills[$index];
    }

    /**
     * @return array
     */
    public function getBills(): array
    {
        return $this->bills;
    }

    /**
     * @param array $bills
     */
    public function setBills(array $bills)
    {
        $this->bills = $bills;
    }

    /**
     * @return int
     */
    public function getPaidBillsCount(): int
    {
        return $this->paidBillsCount;
    }

    /**
     * @param int $paidBillsCount
     */
    public function setPaidBillsCount(int $paidBillsCount): void
    {
        $this->paidBillsCount = $paidBillsCount;
    }

    /**
     * @return int
     */
    public function getNotPaidBillsCount(): int
    {
        return $this->notPaidBillsCount;
    }

    /**
     * @param int $notPaidBillsCount
     */
    public function setNotPaidBillsCount(int $notPaidBillsCount): void
    {
        $this->notPaidBillsCount = $notPaidBillsCount;
    }

    /**
     * @return int
     */
    public function getTotalPayment(): int
    {
        return $this->totalPayment;
    }

    /**
     * @param int $totalPayment
     */
    public function setTotalPayment(int $totalPayment): void
    {
        $this->totalPayment = $totalPayment;
    }
}

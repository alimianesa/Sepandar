<?php


namespace Alimianesa\Sepandar;


class BillAtomicGroupPay
{
    protected array $bills;
    protected int $totalPayment;

    public function __construct(
        array $bills ,
        int $totalPayment
    )
    {
        $this->setBills($bills);
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
    public function setBills(array $bills): void
    {
        $this->bills = $bills;
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

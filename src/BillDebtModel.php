<?php


namespace Alimianesa\Sepandar;


class BillDebtModel
{
    protected int $totalBill;

    public function __construct(int $totalBill)
    {
        $this->setTotalBill($totalBill);
    }

    /**
     * @return int
     */
    public function getTotalBill(): int
    {
        return $this->totalBill;
    }

    /**
     * @param int $totalBill
     */
    public function setTotalBill(int $totalBill): void
    {
        $this->totalBill = $totalBill;
    }
}

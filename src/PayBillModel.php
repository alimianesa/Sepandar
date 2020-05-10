<?php


namespace Alimianesa\Sepandar;


class PayBillModel
{
    protected int $paidBillId ;


    public function __construct(int $paidBillId)
    {
        $this->setPaidBillId($paidBillId);
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
}

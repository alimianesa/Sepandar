<?php


namespace Alimianesa\Sepandar;


class BillAtomicGroupPayArray
{
    protected int $billId;
    protected int $paidBillId;


    public function __construct(
        int $billId ,
        int $paidBillId
    )
    {
        $this->setBillId($billId);
        $this->setPaidBillId($paidBillId);

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

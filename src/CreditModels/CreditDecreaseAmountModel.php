<?php


namespace Alimianesa\Sepandar\CreditModels;


class CreditDecreaseAmountModel
{
    protected int $transId;

    public function __construct($transId)
    {
        $this->setTransId($transId);
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
}

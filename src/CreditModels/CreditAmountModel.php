<?php


namespace Alimianesa\Sepandar\CreditModels;


class CreditAmountModel
{
    protected int $amount;

    public function __construct(int $amount)
    {
        $this->setAmount($amount);
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
}

<?php

namespace Alimianesa\Sepandar;


class PaidModelArray
{
    protected array $paidModelArray;

    public function __construct($paidModelArray)
    {
        $this->paidModelArray = $paidModelArray;
    }

    public function getIndex(int $index):PaidModel
    {
        return $this->paidModelArray[$index];
    }

    public function push($paidModel)
    {
        array_push($this->paidModelArray, $paidModel);
    }
}

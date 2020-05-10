<?php


namespace Alimianesa\Sepandar;


class PayModelArray
{
    protected array $payModelArray;


    public function __construct($payModelArray)
    {
        $this->payModelArray = $payModelArray;
    }

    public function getIndex($index):PayModel
    {
        return $this->payModelArray[$index];
    }

    public function push(PayModel $payModel)
    {
        array_push($this->payModelArray, $payModel);
    }

}

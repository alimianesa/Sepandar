<?php


namespace Alimianesa\Sepandar;


class BillStatusModelArray
{
    protected array $billStatusArray ;

    public function __construct(array $billStatusArray)
    {
        $this->billStatusArray = $billStatusArray;
    }

    public function getIndex(int $index):BillStatus
    {
        return $this->billStatusArray[$index];
    }

    public function push(BillStatus $billStatus)
    {
        array_push($this->billStatusArray , $billStatus);
    }

}

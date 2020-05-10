<?php


namespace Alimianesa\Sepandar\SupplierModels;


class GetMaskanPlate
{
    protected $startDate ;
    protected $endDate;

    public function __construct(
        $startDate,
        $endDate
    )
    {
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }
}

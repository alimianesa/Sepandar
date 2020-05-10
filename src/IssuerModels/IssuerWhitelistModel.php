<?php


namespace Alimianesa\Sepandar\IssuerModels;


class IssuerWhitelistModel
{
    protected $startDate;
    protected $endDate;

    public function __construct(
        $startDate,
        $endDate
    )
    {
        $this->setEndDate($endDate);
        $this->setStartDate($startDate);
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

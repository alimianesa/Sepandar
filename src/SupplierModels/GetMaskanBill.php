<?php


namespace Alimianesa\Sepandar\SupplierModels;


class GetMaskanBill
{
    protected string $plateNumber;
    protected int $billId;
    protected int $amount;
    protected string $freeway;
    protected $issueDate;
    protected $traverseDate;
    protected string $eventId;

    public function __construct(
        int $plateNumber,
        int $billId,
        int $amount,
        string $freeway,
        $issueDate,
        $traverseDate,
        string $eventId
    )
    {
        $this->setPlateNumber($plateNumber);
        $this->setBillId($billId);
        $this->setAmount($amount);
        $this->setFreeway($freeway);
        $this->setIssueDate($issueDate);
        $this->setTraverseDate($traverseDate);
        $this->setEventId($eventId);
    }

    /**
     * @return string
     */
    public function getPlateNumber(): string
    {
        return $this->plateNumber;
    }

    /**
     * @param string $plateNumber
     */
    public function setPlateNumber(string $plateNumber): void
    {
        $this->plateNumber = $plateNumber;
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

    /**
     * @return string
     */
    public function getFreeway(): string
    {
        return $this->freeway;
    }

    /**
     * @param string $freeway
     */
    public function setFreeway(string $freeway): void
    {
        $this->freeway = $freeway;
    }

    /**
     * @return mixed
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param mixed $issueDate
     */
    public function setIssueDate($issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @return mixed
     */
    public function getTraverseDate()
    {
        return $this->traverseDate;
    }

    /**
     * @param mixed $traverseDate
     */
    public function setTraverseDate($traverseDate): void
    {
        $this->traverseDate = $traverseDate;
    }

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId;
    }

    /**
     * @param string $eventId
     */
    public function setEventId(string $eventId): void
    {
        $this->eventId = $eventId;
    }
}

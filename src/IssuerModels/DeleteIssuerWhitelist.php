<?php


namespace Alimianesa\Sepandar\IssuerModels;


class DeleteIssuerWhitelist
{
    protected int $code;
    protected string $message;


    public function __construct(
        int $code ,
        string $message
    )
    {
        $this->setCode($code);
        $this->setMessage($message);
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}

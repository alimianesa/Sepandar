<?php


namespace Alimianesa\Sepandar\IssuerModels;


class IssuerWhitelistModelArray
{
    protected array $issuerWhitelistModelArray;

    public function __construct($issuerWhitelistModelArray)
    {
        $this->issuerWhitelistModelArray = $issuerWhitelistModelArray;
    }

    public function getIndex($index):IssuerWhitelistModel
    {
        return $this->issuerWhitelistModelArray[$index];
    }

    public function push(IssuerWhitelistModel $issuerWhitelistModel)
    {
        array_push($this->issuerWhitelistModelArray, $issuerWhitelistModel);
    }
}

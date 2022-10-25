<?php
declare(strict_types=1);
namespace App\DataTransferObject;

/**
 * Auto generated data provider
 */
final class CurrencyDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $id = '';

    /** @var string */
    protected $name = '';

    /** @var string */
    protected $currencyCode = '';

    /** @var float */
    protected $exchangeRate;


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }


    /**
     * @param string $id
     * @return CurrencyDataProvider
     */
    public function setId(string $id = '')
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return CurrencyDataProvider
     */
    public function unsetId()
    {
        $this->id = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasId()
    {
        return ($this->id !== null && $this->id !== []);
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return CurrencyDataProvider
     */
    public function setName(string $name = '')
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return CurrencyDataProvider
     */
    public function unsetName()
    {
        $this->name = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasName()
    {
        return ($this->name !== null && $this->name !== []);
    }


    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }


    /**
     * @param string $currencyCode
     * @return CurrencyDataProvider
     */
    public function setCurrencyCode(string $currencyCode = '')
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }


    /**
     * @return CurrencyDataProvider
     */
    public function unsetCurrencyCode()
    {
        $this->currencyCode = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCurrencyCode()
    {
        return ($this->currencyCode !== null && $this->currencyCode !== []);
    }


    /**
     * @return float
     */
    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }


    /**
     * @param float $exchangeRate
     * @return CurrencyDataProvider
     */
    public function setExchangeRate(float $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }


    /**
     * @return CurrencyDataProvider
     */
    public function unsetExchangeRate()
    {
        $this->exchangeRate = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasExchangeRate()
    {
        return ($this->exchangeRate !== null && $this->exchangeRate !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'id' =>
          array (
            'name' => 'id',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'name' =>
          array (
            'name' => 'name',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'currencyCode' =>
          array (
            'name' => 'currencyCode',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'exchangeRate' =>
          array (
            'name' => 'exchangeRate',
            'allownull' => false,
            'default' => '',
            'type' => 'float',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}

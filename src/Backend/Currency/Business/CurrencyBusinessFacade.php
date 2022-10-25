<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Business;

use App\Backend\Currency\Persistence\CurrencyEntityManagerInterface;
use App\Backend\Currency\Persistence\CurrencyReaderInterface;
use App\DataTransferObject\CurrencyDataProvider;

class CurrencyBusinessFacade implements CurrencyBusinessFacadeInterface
{
    /**
     * @param CurrencyEntityManagerInterface $currencyEntityManager
     * @param CurrencyReaderInterface $currencyReader
     */
    public function __construct(
        private CurrencyEntityManagerInterface $currencyEntityManager,
        private CurrencyReaderInterface $currencyReader
    ) {}

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return void
     */
    public function delete(CurrencyDataProvider $currencyDto): void
    {
        $this->currencyEntityManager->delete($currencyDto);
    }

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return \App\DataTransferObject\CurrencyDataProvider
     */
    public function save(CurrencyDataProvider $currencyDto): CurrencyDataProvider
    {
        return $this->currencyEntityManager->save($currencyDto);
    }

    /**
     * @param string $id
     *
     * @return \App\DataTransferObject\CurrencyDataProvider|null
     */
    public function getCurrencyById(string $id): ?CurrencyDataProvider
    {
        return $this->currencyReader->getCurrencyById($id);
    }

    /**
     * @param string $currencyCode
     *
     * @return \App\DataTransferObject\CurrencyDataProvider|null
     */
    public function getCurrencyByCurrencyCode(string $currencyCode): ?CurrencyDataProvider
    {
        return $this->currencyReader->getCurrencyByCurrencyCode($currencyCode);
    }
}

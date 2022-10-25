<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Business;

use App\DataTransferObject\CurrencyDataProvider;

interface CurrencyBusinessFacadeInterface
{
    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return void
     */
    public function delete(CurrencyDataProvider $currencyDto): void;

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return \App\DataTransferObject\CurrencyDataProvider
     */
    public function save(CurrencyDataProvider $currencyDto): CurrencyDataProvider;

    /**
     * @param string $id
     *
     * @return \App\DataTransferObject\CurrencyDataProvider|null
     */
    public function getCurrencyById(string $id): ?CurrencyDataProvider;

    /**
     * @param string $currencyCode
     *
     * @return \App\DataTransferObject\CurrencyDataProvider|null
     */
    public function getCurrencyByCurrencyCode(string $currencyCode): ?CurrencyDataProvider;
}

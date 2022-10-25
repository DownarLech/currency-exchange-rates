<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Persistence;

use App\DataTransferObject\CurrencyDataProvider;

interface CurrencyReaderInterface
{
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

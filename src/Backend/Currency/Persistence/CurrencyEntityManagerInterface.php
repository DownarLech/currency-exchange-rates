<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Persistence;

use App\DataTransferObject\CurrencyDataProvider;

interface CurrencyEntityManagerInterface
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
}

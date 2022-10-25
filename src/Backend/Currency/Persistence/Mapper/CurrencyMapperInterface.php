<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Persistence\Mapper;

use App\DataTransferObject\CurrencyDataProvider;
use App\Entity\Currency;

interface CurrencyMapperInterface
{
    /**
     * @param \App\Entity\Currency $currencyEntity
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDataProvider
     *
     * @return \App\DataTransferObject\CurrencyDataProvider
     */
    public function mapCurrencyEntityToCurrencyDto(
        Currency $currencyEntity,
        CurrencyDataProvider $currencyDataProvider
    ): CurrencyDataProvider;

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     * @param \App\Entity\Currency $currencyEntity
     *
     * @return \App\Entity\Currency
     */
    public function mapCurrencyDtoToCurrencyEntity(
        CurrencyDataProvider $currencyDto,
        Currency $currencyEntity
    ): Currency;

    /**
     * @param array $currency
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return \App\DataTransferObject\CurrencyDataProvider
     */
    public function mapArrayToCurrencyDto(
        array $currency,
        CurrencyDataProvider $currencyDto
    ): CurrencyDataProvider;
}

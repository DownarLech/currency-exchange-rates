<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Persistence\Mapper;

use App\DataTransferObject\CurrencyDataProvider;
use App\Entity\Currency;

class CurrencyMapper implements CurrencyMapperInterface
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
    ): CurrencyDataProvider {
        $currencyDataProvider->setId((string)$currencyEntity->getId());
        $currencyDataProvider->setName($currencyEntity->getName());
        $currencyDataProvider->setCurrencyCode($currencyEntity->getCurrencyCode());
        $currencyDataProvider->setExchangeRate($currencyEntity->getExchangeRate());

        return $currencyDataProvider;
    }

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     * @param \App\Entity\Currency $currencyEntity
     *
     * @return \App\Entity\Currency
     */
    public function mapCurrencyDtoToCurrencyEntity(
        CurrencyDataProvider $currencyDto,
        Currency $currencyEntity
    ): Currency {
        $currencyEntity->setName($currencyDto->getName());
        $currencyEntity->setCurrencyCode($currencyDto->getCurrencyCode());
        $currencyEntity->setExchangeRate($currencyDto->getExchangeRate());

        return $currencyEntity;
    }

    /**
     * @param array $currency
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return \App\DataTransferObject\CurrencyDataProvider
     */
    public function mapArrayToCurrencyDto(
        array $currency,
        CurrencyDataProvider $currencyDto
    ): CurrencyDataProvider {
        $currencyDto->setName($currency['currency']);
        $currencyDto->setCurrencyCode($currency['code']);
        $currencyDto->setExchangeRate($currency['mid']);

        return $currencyDto;
    }
}

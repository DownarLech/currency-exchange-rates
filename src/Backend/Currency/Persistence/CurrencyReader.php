<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Persistence;

use App\Backend\Currency\Persistence\Mapper\CurrencyMapperInterface;
use App\DataTransferObject\CurrencyDataProvider;
use App\Entity\Currency;
use App\Repository\CurrencyRepository;

class CurrencyReader implements CurrencyReaderInterface
{
    /**
     * @param CurrencyRepository $currencyRepository
     * @param CurrencyMapperInterface $currencyMapper
     */
    public function __construct(
        private CurrencyRepository $currencyRepository,
        private CurrencyMapperInterface $currencyMapper
    ) {}

    /**
     * @param string $id
     *
     * @return \App\DataTransferObject\CurrencyDataProvider|null
     */
    public function getCurrencyById(string $id): ?CurrencyDataProvider
    {
        $currencyEntity = $this->currencyRepository->findOneById($id);
        if (!$currencyEntity instanceof Currency) {
            return null;
        }

        return $this->currencyMapper->mapCurrencyEntityToCurrencyDto($currencyEntity, new CurrencyDataProvider());
    }

    /**
     * @param string $currencyCode
     *
     * @return \App\DataTransferObject\CurrencyDataProvider|null
     */
    public function getCurrencyByCurrencyCode(string $currencyCode): ?CurrencyDataProvider
    {
        $currencyEntity = $this->currencyRepository->findOneByCurrencyCode($currencyCode);
        if (!$currencyEntity instanceof Currency) {
            return null;
        }

        return $this->currencyMapper->mapCurrencyEntityToCurrencyDto($currencyEntity, new CurrencyDataProvider());
    }
}

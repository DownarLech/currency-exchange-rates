<?php

declare(strict_types = 1);

namespace App\Backend\Import\Business\Model\Importer;

use App\Backend\Currency\Business\CurrencyBusinessFacadeInterface;
use App\Backend\Currency\Persistence\Mapper\CurrencyMapperInterface;
use App\Backend\Import\ImportConfig;
use App\DataTransferObject\CurrencyDataProvider;
use App\Service\NbpHttpClient\NbpHttpClient;

class NbpExchangeRatesImporter implements NbpExchangeRatesImporterInterface
{
    /**
     * @param \App\Service\NbpHttpClient\NbpHttpClient $nbpHttpClient
     * @param \App\Backend\Currency\Persistence\Mapper\CurrencyMapperInterface $currencyMapper
     * @param \App\Backend\Currency\Business\CurrencyBusinessFacadeInterface $currencyBusinessFacade
     */
    public function __construct(
        private NbpHttpClient $nbpHttpClient,
        private CurrencyMapperInterface $currencyMapper,
        private CurrencyBusinessFacadeInterface $currencyBusinessFacade,
    ) {}

    /**
     * @return void
     */
    public function importCurrencyExchangeRatesFromTableA(): void
    {
        $currencyExchangeRates = $this->nbpHttpClient->getExchangeRates(ImportConfig::URL_END_TABLES_A);

        foreach ($currencyExchangeRates as $currency) {
            $currencyDto = $this->currencyMapper->mapArrayToCurrencyDto($currency, new CurrencyDataProvider());
            $this->currencyBusinessFacade->save($currencyDto);
        }
    }
}

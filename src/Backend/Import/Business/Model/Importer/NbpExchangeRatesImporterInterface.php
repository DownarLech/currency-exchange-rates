<?php

declare(strict_types = 1);

namespace App\Backend\Import\Business\Model\Importer;

interface NbpExchangeRatesImporterInterface
{
    /**
     * @return void
     */
    public function importCurrencyExchangeRatesFromTableA(): void;
}

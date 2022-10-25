<?php

declare(strict_types = 1);

namespace App\Command;

use App\Backend\Import\Business\Model\Importer\NbpExchangeRatesImporterInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends Command
{
    private const COMMAND = 'data:import:table_a';
    private const DESCRIPTION = 'Import all necessary currency data from table A';

    /**
     * @var \App\Backend\Import\Business\Model\Importer\NbpExchangeRatesImporterInterface
     */
    private NbpExchangeRatesImporterInterface $nbpExchangeRatesImporter;

    /**
     * @param \App\Backend\Import\Business\Model\Importer\NbpExchangeRatesImporterInterface $nbpExchangeRatesImporter
     */
    public function __construct(NbpExchangeRatesImporterInterface $nbpExchangeRatesImporter)
    {
        $this->nbpExchangeRatesImporter = $nbpExchangeRatesImporter;
        parent::__construct();
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setName(self::COMMAND)
            ->setDescription(self::DESCRIPTION);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->nbpExchangeRatesImporter->importCurrencyExchangeRatesFromTableA();
        return Command::SUCCESS;
    }
}

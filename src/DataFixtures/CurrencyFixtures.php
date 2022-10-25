<?php

declare(strict_types = 1);

namespace App\DataFixtures;

use App\Backend\Currency\Persistence\CurrencyEntityManagerInterface;
use App\Backend\Currency\Persistence\Mapper\CurrencyMapperInterface;
use App\DataTransferObject\CurrencyDataProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CurrencyFixtures extends Fixture
{
    /**
     * @param CurrencyEntityManagerInterface $currencyEntityManager
     * @param CurrencyMapperInterface $currencyMapper
     */
    public function __construct(
        private CurrencyEntityManagerInterface $currencyEntityManager,
        private CurrencyMapperInterface $currencyMapper
    ) {}

    /**
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $this->truncateClientTable($manager);
        $this->saveMockCurrencySet($this->getMockCurrencySet());
    }

    /**
     * @param ObjectManager $manager
     */
    public function truncateClientTable(ObjectManager $manager): void
    {
        $connection = $manager->getConnection();
        $connection->getDatabasePlatform();

        $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 0;');
        $connection->executeQuery('DELETE FROM currency');
        $connection->executeQuery('ALTER TABLE currency AUTO_INCREMENT = 1');
        $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 1;');
        $manager->clear();
    }

    /**
     * @param array $mockCurrencySet
     *
     * @return CurrencyDataProvider[]
     */
    private function saveMockCurrencySet(array $mockCurrencySet): array
    {
        $currencyDtos = [];

        foreach ($mockCurrencySet as $mockCurrency) {
            $currencyDataProvider = $this->currencyMapper->mapArrayToCurrencyDto($mockCurrency, new CurrencyDataProvider());
            $currencyDtos[] = $this->currencyEntityManager->save($currencyDataProvider);
        }

        return $currencyDtos;
    }

    /**
     * @return array
     */
    private function getMockCurrencySet(): array
    {
        return [
            0 => [
                'currency' => 'euro',
                'code' => 'EUR',
                'mid' => 4.7866
            ],
            1 => [
                'currency' => 'korona czeska',
                'code' => 'CZK',
                'mid' => 0.1955
            ],
            2 => [
                'currency' => 'dolar australijski',
                'code' => 'AUD',
                'mid' => 3.0643
            ],
        ];
    }
}

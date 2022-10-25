<?php

declare(strict_types = 1);

namespace App\Tests\Unit\Backend\Currency\Business;

use App\Backend\Currency\Business\CurrencyBusinessFacade;
use App\Backend\Currency\Business\CurrencyBusinessFacadeInterface;
use App\DataFixtures\CurrencyFixtures;
use App\DataTransferObject\CurrencyDataProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrencyBusinessFacadeTest extends KernelTestCase
{
    private CurrencyBusinessFacadeInterface $currencyBusinessFacade;
    private CurrencyFixtures $currencyFixtures;
    private ?EntityManagerInterface $entityManager;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();

        $currencyBusinessFacade = static::getContainer()->get(CurrencyBusinessFacade::class);
        $this->currencyBusinessFacade = $currencyBusinessFacade;

        $currencyFixture = static::getContainer()->get(CurrencyFixtures::class);
        $this->currencyFixtures = $currencyFixture;

        $this->currencyFixtures->load($this->entityManager);
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        $this->entityManager->close();
        $this->entityManager = null;

        parent::tearDown();
    }

    /**
     * @return void
     */
    public function testSave(): void
    {
        $currencyDataProvider =  new CurrencyDataProvider();
        $currencyDataProvider->setName('lira turecka');
        $currencyDataProvider->setCurrencyCode('TRY');
        $currencyDataProvider->setExchangeRate(0.2616);

        $currencyDto = $this->currencyBusinessFacade->save($currencyDataProvider);
        $currencyFromDb = $this->currencyBusinessFacade->getCurrencyById($currencyDto->getId());

        self::assertSame($currencyDto->getId(), $currencyFromDb->getId());
        self::assertSame($currencyDataProvider->getName(), $currencyFromDb->getName());
        self::assertSame($currencyDataProvider->getCurrencyCode(), $currencyFromDb->getCurrencyCode());
        self::assertSame($currencyDataProvider->getExchangeRate(), $currencyFromDb->getExchangeRate());
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $currencyDataProvider =  new CurrencyDataProvider();
        $currencyDataProvider->setName('jen (Japonia)');
        $currencyDataProvider->setCurrencyCode('JPY');
        $currencyDataProvider->setExchangeRate(0.032593);

        $currencyDto = $this->currencyBusinessFacade->save($currencyDataProvider);
        $currencyFromDb = $this->currencyBusinessFacade->getCurrencyById($currencyDto->getId());

        self::assertSame($currencyDto->getId(), $currencyFromDb->getId());
        self::assertSame($currencyDataProvider->getName(), $currencyFromDb->getName());
        self::assertSame($currencyDataProvider->getCurrencyCode(), $currencyFromDb->getCurrencyCode());
        self::assertSame($currencyDataProvider->getExchangeRate(), $currencyFromDb->getExchangeRate());

        $currencyDataProvider =  new CurrencyDataProvider();
        $currencyDataProvider->setName('jen (Japonia)');
        $currencyDataProvider->setCurrencyCode('JPY');
        $currencyDataProvider->setExchangeRate(24.0456);

        $currencyDto = $this->currencyBusinessFacade->save($currencyDataProvider);
        $currencyFromDb = $this->currencyBusinessFacade->getCurrencyById($currencyDto->getId());

        self::assertSame($currencyDataProvider->getExchangeRate(), $currencyFromDb->getExchangeRate());
    }
}

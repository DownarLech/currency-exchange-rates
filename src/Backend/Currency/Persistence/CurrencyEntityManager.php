<?php

declare(strict_types = 1);

namespace App\Backend\Currency\Persistence;

use App\Backend\Currency\Persistence\Mapper\CurrencyMapperInterface;
use App\DataTransferObject\CurrencyDataProvider;
use App\Entity\Currency;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\EntityManagerInterface;

class CurrencyEntityManager implements CurrencyEntityManagerInterface
{
    /**
     * @param CurrencyRepository $currencyRepository
     * @param CurrencyMapperInterface $currencyMapper
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        private CurrencyRepository $currencyRepository,
        private CurrencyMapperInterface $currencyMapper,
        private EntityManagerInterface $entityManager
    ) {}

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return void
     */
    public function delete(CurrencyDataProvider $currencyDto): void
    {
        $currencyEntity = $this->currencyRepository->findOneById($currencyDto->getId());
        $this->entityManager->remove($currencyEntity);
        $this->entityManager->flush();
    }

    /**
     * @param \App\DataTransferObject\CurrencyDataProvider $currencyDto
     *
     * @return \App\DataTransferObject\CurrencyDataProvider
     */
    public function save(CurrencyDataProvider $currencyDto): CurrencyDataProvider
    {
//        if ($currencyDto->hasId()) {
//            $currencyEntity = $this->currencyRepository->findOneById($currencyDto->getId());
//        }

        if ($currencyDto->hasCurrencyCode()) {
            $currencyEntity = $this->currencyRepository->findOneByCurrencyCode($currencyDto->getCurrencyCode());
        }

        if (!isset($currencyEntity) || !$currencyEntity instanceof Currency) {
            $currencyEntity = new Currency();
        }

        $this->currencyMapper->mapCurrencyDtoToCurrencyEntity($currencyDto, $currencyEntity);
        $this->entityManager->persist($currencyEntity);
        $this->entityManager->flush();

        return $this->currencyMapper->mapCurrencyEntityToCurrencyDto($currencyEntity, $currencyDto);
    }
}

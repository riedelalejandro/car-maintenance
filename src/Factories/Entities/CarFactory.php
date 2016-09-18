<?php

namespace CarMaintenance\Factories\Entities;

use CarMaintenance\Entities\Car;
use CarMaintenance\Factories\FakeFactory;
use CarMaintenance\Factories\ValueObjects\CarDomainFactory;
use CarMaintenance\Factories\ValueObjects\VinFactory;

/**
 * Class CarFactory.
 */
class CarFactory extends FakeFactory
{
    /**
     * @return Car
     */
    public function fake()
    {
        /** @var CustomerFactory $customerFactory */
        $customerFactory = app(CustomerFactory::class);
        /** @var VersionFactory $versionFactory */
        $versionFactory = app(VersionFactory::class);
        /** @var VinFactory $vinFactory */
        $vinFactory = app(VinFactory::class);
        /** @var CarDomainFactory $carDomainFactory */
        $carDomainFactory = app(CarDomainFactory::class);

        return new Car($customerFactory->fake(), $versionFactory->fake(), $vinFactory->fake(), $carDomainFactory->fake());
    }
}

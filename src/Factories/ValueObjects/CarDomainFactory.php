<?php

namespace CarMaintenance\Factories\ValueObjects;

use CarMaintenance\Factories\FakeFactory;
use CarMaintenance\ValueObjects\CarDomain;

/**
 * Class CarDomainFactory.
 */
class CarDomainFactory extends FakeFactory
{
    /**
     * @return CarDomain
     */
    public function fake()
    {
        return new CarDomain($this->faker->bothify('???###'));
    }
}

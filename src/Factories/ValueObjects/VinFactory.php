<?php

namespace CarMaintenance\Factories\ValueObjects;

use CarMaintenance\Factories\FakeFactory;
use CarMaintenance\ValueObjects\Vin;

/**
 * Class VinFactory.
 */
class VinFactory extends FakeFactory
{
    /**
     * @return Vin
     */
    public function fake()
    {
        return new Vin($this->faker->bothify('???#?#?##??######'));
    }
}

<?php

namespace CarMaintenance\Events\Services;

use CarMaintenance\Entities\Car;

/**
 * Class CarCreated.
 */
class CarCreated
{
    /**
     * @var Car
     */
    private $car;

    /**
     * CarCreated constructor.
     *
     * @param Car $car
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }
}

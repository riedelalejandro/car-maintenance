<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Timestamps;

/**
 * Class Reminder.
 */
class Reminder
{
    use Identifiable;
    use Timestamps;

    /**
     * @var Car
     */
    private $car;
    /**
     * @var Service
     */
    private $service;

    /**
     * Reminder constructor.
     *
     * @param Car     $car
     * @param Service $service
     */
    public function __construct(Car $car, Service $service)
    {
        $this->car = $car;
        $this->service = $service;
    }
}

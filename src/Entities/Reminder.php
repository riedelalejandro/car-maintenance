<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\ReminderStatus;

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
     * @var ReminderStatus
     */
    private $reminderStatus;

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
        $this->reminderStatus = ReminderStatus::pending();
    }
}

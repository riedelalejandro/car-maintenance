<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Timestamps;

/**
 * Class Booking.
 */
class Booking
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
     * @var BookingStatus
     */
    private $bookingStatus;

    /**
     * Booking constructor.
     *
     * @param Car     $car
     * @param Service $service
     */
    public function __construct(Car $car, Service $service)
    {
        $this->car = $car;
        $this->service = $service;
        $this->bookingStatus = BookingStatus::pending();
    }
}

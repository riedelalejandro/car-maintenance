<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\BookingStatus;

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

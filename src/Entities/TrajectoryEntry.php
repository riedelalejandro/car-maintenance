<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Timestamps;

/**
 * Class TrajectoryEntry.
 */
class TrajectoryEntry
{
    use Identifiable;
    use Timestamps;

    /**
     * @var Car
     */
    private $car;

    /**
     * TrajectoryEntry constructor.
     *
     * @param Car $car
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }
}

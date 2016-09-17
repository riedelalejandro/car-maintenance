<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Timestamps;

/**
 * Class TrajectoryPrediction.
 */
class TrajectoryPrediction
{
    use Identifiable;
    use Timestamps;

    /**
     * @var Car
     */
    private $car;

    /**
     * TrajectoryPrediction constructor.
     *
     * @param Car $car
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }
}

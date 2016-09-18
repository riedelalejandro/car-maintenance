<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\TrajectoryPredictionPeriod;
use CarMaintenance\ValueObjects\Trajectory;

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
     * @var Trajectory
     */
    private $trajectory;
    /**
     * @var TrajectoryPredictionPeriod
     */
    private $trajectoryPeriod;

    /**
     * TrajectoryPrediction constructor.
     *
     * @param Car                        $car
     * @param Trajectory                 $trajectory
     * @param TrajectoryPredictionPeriod $trajectoryPeriod
     */
    public function __construct(Car $car, Trajectory $trajectory, TrajectoryPredictionPeriod $trajectoryPeriod)
    {
        $this->car = $car;
        $this->trajectory = $trajectory;
        $this->trajectoryPeriod = $trajectoryPeriod;
    }
}

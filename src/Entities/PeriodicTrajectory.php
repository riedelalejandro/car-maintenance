<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\PeriodicTrajectoryPeriod;
use CarMaintenance\ValueObjects\Trajectory;

/**
 * Class PeriodicTrajectory.
 */
class PeriodicTrajectory
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
     * @var PeriodicTrajectoryPeriod
     */
    private $trajectoryPeriod;

    /**
     * PeriodicTrajectory constructor.
     *
     * @param Car                      $car
     * @param Trajectory               $trajectory
     * @param PeriodicTrajectoryPeriod $trajectoryPeriod
     */
    public function __construct(Car $car, Trajectory $trajectory, PeriodicTrajectoryPeriod $trajectoryPeriod)
    {
        $this->car = $car;
        $this->trajectory = $trajectory;
        $this->trajectoryPeriod = $trajectoryPeriod;
    }

    /**
     * @return Trajectory
     */
    public function getTrajectory()
    {
        return $this->trajectory;
    }

    /**
     * @return PeriodicTrajectoryPeriod
     */
    public function getTrajectoryPeriod()
    {
        return $this->trajectoryPeriod;
    }
}

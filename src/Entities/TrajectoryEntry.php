<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\Trajectory;

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
     * @var Trajectory
     */
    private $trajectory;

    /**
     * TrajectoryEntry constructor.
     *
     * @param Car        $car
     * @param Trajectory $trajectory
     */
    public function __construct(Car $car, Trajectory $trajectory)
    {
        $this->car = $car;
        $this->trajectory = $trajectory;
    }

    /**
     * @return Trajectory
     */
    public function getTrajectory()
    {
        return $this->trajectory;
    }
}

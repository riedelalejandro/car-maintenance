<?php

namespace CarMaintenance\Events\Services;

use CarMaintenance\Entities\TrajectoryEntry;

/**
 * Class CarTrajectoryAdded.
 */
class CarTrajectoryAdded
{
    /**
     * @var TrajectoryEntry
     */
    private $trajectoryEntry;

    /**
     * CarTrajectoryAdded constructor.
     *
     * @param TrajectoryEntry $trajectoryEntry
     */
    public function __construct(TrajectoryEntry $trajectoryEntry)
    {
        $this->trajectoryEntry = $trajectoryEntry;
    }
}

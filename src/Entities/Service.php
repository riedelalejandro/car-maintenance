<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Nameable;
use CarMaintenance\Traits\Timestamps;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Service.
 */
class Service
{
    use Identifiable;
    use Nameable;
    use Timestamps;

    /**
     * @var ServiceStatus
     */
    private $serviceStatus;
    /**
     * @var Version[]|ArrayCollection
     */
    private $allowedVersions;

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $this->serviceStatus = ServiceStatus::pending();

        $this->allowedVersions = new ArrayCollection();
    }
}

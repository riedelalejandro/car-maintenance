<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Nameable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\ServiceStatus;
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

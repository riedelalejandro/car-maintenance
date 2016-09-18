<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;

/**
 * Class ServiceSchedule.
 */
class ServiceSchedule
{
    use Identifiable;
    use Timestamps;

    /**
     * @var Service
     */
    private $service;

    /**
     * ServiceSchedule constructor.
     *
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}

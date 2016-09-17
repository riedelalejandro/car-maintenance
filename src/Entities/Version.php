<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Nameable;
use CarMaintenance\Traits\Timestamps;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Version.
 */
class Version
{
    use Identifiable;
    use Nameable;
    use Timestamps;

    /**
     * @var Model
     */
    private $model;
    /**
     * @var Service[]|ArrayCollection
     */
    private $allowedServices;

    /**
     * Version constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->allowedServices = new ArrayCollection();
    }
}

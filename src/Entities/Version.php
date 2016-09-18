<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Nameable;
use CarMaintenance\Traits\Entities\Timestamps;
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

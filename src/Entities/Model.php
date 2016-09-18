<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Nameable;
use CarMaintenance\Traits\Entities\Timestamps;

/**
 * Class Model.
 */
class Model
{
    use Identifiable;
    use Nameable;
    use Timestamps;

    /**
     * @var Brand
     */
    private $brand;

    /**
     * Model constructor.
     *
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
}

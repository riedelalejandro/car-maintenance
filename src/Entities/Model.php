<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Nameable;
use CarMaintenance\Traits\Timestamps;

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

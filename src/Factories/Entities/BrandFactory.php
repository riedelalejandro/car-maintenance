<?php

namespace CarMaintenance\Factories\Entities;

use CarMaintenance\Entities\Brand;
use CarMaintenance\Factories\FakeFactory;

/**
 * Class BrandFactory.
 */
class BrandFactory extends FakeFactory
{
    /**
     * @return Brand
     */
    public function fake()
    {
        return new Brand();
    }
}

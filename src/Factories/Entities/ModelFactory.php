<?php

namespace CarMaintenance\Factories\Entities;

use CarMaintenance\Entities\Model;
use CarMaintenance\Factories\FakeFactory;

/**
 * Class ModelFactory.
 */
class ModelFactory extends FakeFactory
{
    /**
     * @return Model
     */
    public function fake()
    {
        /** @var BrandFactory $brandFactory */
        $brandFactory = app(BrandFactory::class);

        return new Model($brandFactory->fake());
    }
}

<?php

namespace CarMaintenance\Factories\Entities;

use CarMaintenance\Entities\Version;
use CarMaintenance\Factories\FakeFactory;

/**
 * Class VersionFactory.
 */
class VersionFactory extends FakeFactory
{
    /**
     * @return Version
     */
    public function fake()
    {
        /* @var ModelFactory $brandFactory */
        $modelFactory = app(ModelFactory::class);

        return new Version($modelFactory->fake());
    }
}

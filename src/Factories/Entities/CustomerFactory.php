<?php

namespace CarMaintenance\Factories\Entities;

use CarMaintenance\Entities\Customer;
use CarMaintenance\Factories\FakeFactory;

/**
 * Class CustomerFactory.
 */
class CustomerFactory extends FakeFactory
{
    /**
     * @return Customer
     */
    public function fake()
    {
        return new Customer();
    }
}

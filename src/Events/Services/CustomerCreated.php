<?php

namespace CarMaintenance\Events\Services;

use CarMaintenance\Entities\Customer;

/**
 * Class CustomerCreated.
 */
class CustomerCreated
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * CustomerCreated constructor.
     *
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
}

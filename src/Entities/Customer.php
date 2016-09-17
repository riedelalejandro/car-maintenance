<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Identifiable;
use CarMaintenance\Traits\Timestamps;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Customer.
 */
class Customer
{
    use Identifiable;
    use Timestamps;

    /**
     * @var Car[]|ArrayCollection
     */
    private $cars;
    /**
     * @var CustomerStatus
     */
    private $customerStatus;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->cars = new ArrayCollection();
        $this->customerStatus = CustomerStatus::pending();
    }
}

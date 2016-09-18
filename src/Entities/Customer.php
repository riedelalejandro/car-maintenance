<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\CustomerStatus;
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

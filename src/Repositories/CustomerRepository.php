<?php

namespace CarMaintenance\Repositories;

use CarMaintenance\Entities;
use CarMaintenance\Exceptions\Repositories\WriteRepositoryException;

/**
 * Interface CustomerRepository.
 */
interface CustomerRepository
{
    /**
     * @param Entities\Customer $customer
     *
     * @return Entities\Car
     *
     * @throws WriteRepositoryException
     */
    public function save(Entities\Customer $customer);
}

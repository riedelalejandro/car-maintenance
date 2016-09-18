<?php

namespace CarMaintenance\Repositories;

use CarMaintenance\Entities;
use CarMaintenance\Exceptions\Repositories\WriteRepositoryException;

/**
 * Interface CarRepository.
 */
interface CarRepository
{
    /**
     * @param Entities\Car $car
     *
     * @return Entities\Car
     *
     * @throws WriteRepositoryException
     */
    public function save(Entities\Car $car);
}

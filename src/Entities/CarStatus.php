<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Statusable;

/**
 * Class CarStatus.
 */
class CarStatus
{
    use Statusable;

    const ACTIVE = 'active';

    /**
     * @return CarStatus
     */
    public static function active()
    {
        return new static(static::ACTIVE);
    }
}

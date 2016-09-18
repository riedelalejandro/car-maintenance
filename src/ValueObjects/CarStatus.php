<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Traits\ValueObjects\Statusable;

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

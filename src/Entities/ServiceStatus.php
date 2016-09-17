<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Statusable;

/**
 * Class ServiceStatus.
 */
class ServiceStatus
{
    use Statusable;

    const PENDING = 'pending';

    /**
     * @return ServiceStatus
     */
    public static function pending()
    {
        return new static(static::PENDING);
    }
}

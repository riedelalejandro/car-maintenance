<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Traits\ValueObjects\Statusable;

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

<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Traits\ValueObjects\Statusable;

/**
 * Class CustomerStatus.
 */
class CustomerStatus
{
    use Statusable;

    const PENDING = 'pending';

    /**
     * @return CustomerStatus
     */
    public static function pending()
    {
        return new static(static::PENDING);
    }
}

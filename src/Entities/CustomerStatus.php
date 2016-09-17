<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Statusable;

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

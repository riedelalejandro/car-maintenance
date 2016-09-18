<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Traits\ValueObjects\Statusable;

/**
 * Class ReminderStatus.
 */
class ReminderStatus
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

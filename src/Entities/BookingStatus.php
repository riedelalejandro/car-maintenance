<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Statusable;

/**
 * Class BookingStatus.
 */
class BookingStatus
{
    use Statusable;

    const PENDING = 'pending';

    /**
     * @return BookingStatus
     */
    public static function pending()
    {
        return new static(static::PENDING);
    }
}

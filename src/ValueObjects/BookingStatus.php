<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Traits\ValueObjects\Statusable;

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

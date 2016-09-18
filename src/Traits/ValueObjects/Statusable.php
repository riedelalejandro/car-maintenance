<?php

namespace CarMaintenance\Traits\ValueObjects;

/**
 * Class Statusable.
 */
trait Statusable
{
    /**
     * @var string
     */
    private $status;

    /**
     * Statusable constructor.
     *
     * @param $status
     */
    private function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @param string|null $status
     *
     * @return bool|string
     */
    public function is($status = null)
    {
        if ($status) {
            return $this->status == $status;
        }

        return $this->status;
    }
}

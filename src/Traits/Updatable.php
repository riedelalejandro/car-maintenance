<?php

namespace CarMaintenance\Traits;

/**
 * Class Updatable.
 */
trait Updatable
{
    /**
     * @var \Carbon\Carbon
     */
    protected $updatedAt;

    /**
     * @return \Carbon\Carbon
     */
    public function getUpdatedAt()
    {
        if (!$this->updatedAt instanceof \Carbon\Carbon) {
            return \Carbon\Carbon::instance($this->updatedAt);
        }

        return $this->updatedAt;
    }
}

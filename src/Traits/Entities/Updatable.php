<?php

namespace CarMaintenance\Traits\Entities;

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

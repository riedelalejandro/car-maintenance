<?php

namespace CarMaintenance\Traits;

/**
 * Class Creatable.
 */
trait Creatable
{
    /**
     * @var \Carbon\Carbon
     */
    protected $createdAt;

    /**
     * @return \Carbon\Carbon
     */
    public function getCreatedAt()
    {
        if (!$this->createdAt instanceof \Carbon\Carbon) {
            return \Carbon\Carbon::instance($this->createdAt);
        }

        return $this->createdAt;
    }
}

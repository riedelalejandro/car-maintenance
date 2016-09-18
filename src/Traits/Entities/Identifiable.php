<?php

namespace CarMaintenance\Traits\Entities;

/**
 * Class Identifiable.
 */
trait Identifiable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

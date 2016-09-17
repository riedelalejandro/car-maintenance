<?php

namespace CarMaintenance\Traits;

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

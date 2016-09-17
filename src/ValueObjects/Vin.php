<?php

namespace CarMaintenance\ValueObjects;

class Vin
{
    /**
     * @var string
     */
    private $vin;

    /**
     * Vin constructor.
     *
     * @param string $vin
     */
    public function __construct($vin)
    {
        $this->vin = $vin;
    }
}

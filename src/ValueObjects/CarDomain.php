<?php

namespace CarMaintenance\ValueObjects;

/**
 * Class CarDomain.
 */
class CarDomain
{
    /**
     * @var string
     */
    private $domain;

    /**
     * CarDomain constructor.
     *
     * @param string $domain
     */
    public function __construct($domain)
    {
        $this->domain = $domain;
    }
}

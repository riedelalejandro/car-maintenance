<?php

namespace CarMaintenance\Factories;

use Faker\Factory;

/**
 * Class FakeFactory.
 */
class FakeFactory
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * FakeFactory constructor.
     */
    public function __construct()
    {
        $this->faker = Factory::create();
    }
}

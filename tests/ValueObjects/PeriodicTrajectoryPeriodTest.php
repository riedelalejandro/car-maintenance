<?php

namespace Test\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use CarMaintenance\ValueObjects\PeriodicTrajectoryPeriod;
use Faker\Factory;
use Test\Src\TestCase;

/**
 * Class PeriodicTrajectoryPeriodTest.
 */
class PeriodicTrajectoryPeriodTest extends TestCase
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    public function setUp()
    {
        parent::setUp();

        $this->faker = Factory::create();
    }

    public function test_value_object_trajectory_prediction_period_empty_month()
    {
        $this->expectException(CreateValueObjectException::class);

        new PeriodicTrajectoryPeriod(null, $this->faker->numberBetween(date('Y') - 1, date('Y') + 1));
    }

    public function test_value_object_trajectory_prediction_period_empty_year()
    {
        $this->expectException(CreateValueObjectException::class);

        new PeriodicTrajectoryPeriod($this->faker->numberBetween(1, 12), null);
    }

    public function test_value_object_trajectory_prediction_period_valid()
    {
        $validYear = $this->faker->numberBetween(date('Y') - 1, date('Y') + 1);
        $validMonth = $this->faker->numberBetween(1, 12);

        $month = new PeriodicTrajectoryPeriod($validYear, $validMonth);

        $this->assertEquals($month->getYear(), $validYear);
        $this->assertEquals($month->getMonth(), $validMonth);
    }
}

<?php

namespace Test\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use CarMaintenance\ValueObjects\TrajectoryPredictionPeriod;
use Faker\Factory;
use Test\Src\TestCase;

/**
 * Class TrajectoryPredictionPeriodTest.
 */
class TrajectoryPredictionPeriodTest extends TestCase
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

        new TrajectoryPredictionPeriod(null, $this->faker->numberBetween(date('Y') - 1, date('Y') + 1));
    }

    public function test_value_object_trajectory_prediction_period_empty_year()
    {
        $this->expectException(CreateValueObjectException::class);

        new TrajectoryPredictionPeriod($this->faker->numberBetween(1, 12), null);
    }

    public function test_value_object_trajectory_prediction_period_valid()
    {
        $validYear = $this->faker->numberBetween(date('Y') - 1, date('Y') + 1);
        $validMonth = $this->faker->numberBetween(1, 12);

        $month = new TrajectoryPredictionPeriod($validYear, $validMonth);

        $this->assertEquals($month->getYear(), $validYear);
        $this->assertEquals($month->getMonth(), $validMonth);
    }
}

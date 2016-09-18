<?php

namespace Test\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use CarMaintenance\ValueObjects\Trajectory;
use Faker\Factory;
use Test\Src\TestCase;

/**
 * Class TrajectoryTest.
 */
class TrajectoryTest extends TestCase
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

    public function test_value_object_trajectory_empty()
    {
        $this->expectException(CreateValueObjectException::class);

        new Trajectory(null);
    }

    public function test_value_object_trajectory_less_than_min()
    {
        $this->expectException(CreateValueObjectException::class);

        new Trajectory(0);
    }

    public function test_value_object_trajectory_greater_than_max()
    {
        $this->expectException(CreateValueObjectException::class);

        new Trajectory($this->faker->numberBetween(999999, 9999999));
    }

    public function test_value_object_vin_valid()
    {
        $numericTrajectory = $this->faker->numberBetween(1, 999999);
        $trajectory = new Trajectory($numericTrajectory);

        $this->assertEquals($numericTrajectory, $trajectory->__toString());
    }
}

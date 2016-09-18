<?php

namespace Test\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use CarMaintenance\ValueObjects\Vin;
use Faker\Factory;
use Test\Src\TestCase;

/**
 * Class VinTest.
 */
class VinTest extends TestCase
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

    public function test_value_object_vin_empty()
    {
        $this->expectException(CreateValueObjectException::class);

        new Vin(null);
    }

    public function test_value_object_vin_valid()
    {
        $plainValidVin = $this->faker->bothify('???#?#?##??######');

        $vin = new Vin($plainValidVin);

        $this->assertEquals($plainValidVin, $vin->__toString());
    }

//    public function test_value_object_vin_invalid()
//    {
//        // TODO.
//    }
}

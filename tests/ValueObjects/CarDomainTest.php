<?php

namespace Test\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use CarMaintenance\ValueObjects\CarDomain;
use Faker\Factory;
use Test\Src\TestCase;

/**
 * Class CarDomainTest.
 */
class CarDomainTest extends TestCase
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

    public function test_value_object_car_domain_empty()
    {
        $this->expectException(CreateValueObjectException::class);

        new CarDomain(null);
    }

    public function test_value_object_car_domain_valid()
    {
        $plainValidCarDomain = $this->faker->bothify('???###');

        $carDomain = new CarDomain($plainValidCarDomain);

        $this->assertEquals($plainValidCarDomain, $carDomain->__toString());
    }

//    public function test_value_object_car_domain_invalid()
//    {
//        // TODO.
//    }
}

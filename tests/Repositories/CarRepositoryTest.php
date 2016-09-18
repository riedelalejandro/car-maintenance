<?php

namespace Test\Repositories;

use CarMaintenance\Entities\Car;
use CarMaintenance\Factories\Entities\CarFactory;
use CarMaintenance\Repositories\CarRepository;
use Mockery\MockInterface;
use Test\Src\TestCase;

/**
 * Class CarRepositoryTest.
 */
class CarRepositoryTest extends TestCase
{
    /** @var CarRepository|MockInterface */
    private $repository;
    /** @var CarFactory */
    private $carFactory;

    public function setUp()
    {
        parent::setUp();

        $this->repository = \Mockery::mock(CarRepository::class);
        $this->carFactory = app(CarFactory::class);
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    public function test_car_repository_save_success()
    {
        $car = $this->carFactory->fake();

        $this->repository
            ->shouldReceive('save')
            ->once()
            ->andReturn($car);

        $newCar = $this->repository->save($car);

        $this->assertInstanceOf(Car::class, $newCar);
    }
}

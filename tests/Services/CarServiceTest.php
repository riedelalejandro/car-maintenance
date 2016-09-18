<?php

namespace Test\Services;

use CarMaintenance\Entities\Car;
use CarMaintenance\Entities\TrajectoryEntry;
use CarMaintenance\Exceptions\Repositories\WriteRepositoryException;
use CarMaintenance\Exceptions\Services\ServiceException;
use CarMaintenance\Factories\Entities\CarFactory;
use CarMaintenance\Factories\Entities\CustomerFactory;
use CarMaintenance\Factories\Entities\VersionFactory;
use CarMaintenance\Factories\ValueObjects\CarDomainFactory;
use CarMaintenance\Factories\ValueObjects\VinFactory;
use CarMaintenance\Repositories\CarRepository;
use CarMaintenance\Services\CarService;
use Faker\Factory;
use Illuminate\Support\MessageBag;
use Mockery\MockInterface;
use Test\Src\TestCase;

/**
 * Class CarServiceTest.
 */
class CarServiceTest extends TestCase
{
    /**
     * @var CarService
     */
    private $carService;
    /**
     * @var CarRepository|MockInterface
     */
    private $carRepository;
    /** @var CustomerFactory */
    private $customerFactory;
    /** @var VersionFactory */
    private $versionFactory;
    /** @var VinFactory */
    private $vinFactory;
    /** @var CarDomainFactory */
    private $carDomainFactory;
    /** @var CarFactory */
    private $carFactory;
    /**
     * @var \Faker\Generator
     */
    private $faker;

    public function setUp()
    {
        parent::setUp();

        $this->carRepository = \Mockery::mock(CarRepository::class);

        $this->carService = new CarService($this->carRepository);

        $this->customerFactory = app(CustomerFactory::class);
        $this->versionFactory = app(VersionFactory::class);
        $this->vinFactory = app(VinFactory::class);
        $this->carDomainFactory = app(CarDomainFactory::class);
        $this->carFactory = app(CarFactory::class);
        $this->faker = Factory::create();
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    public function test_car_service_create_invalid_vin()
    {
        $this->expectException(ServiceException::class);

        $customer = $this->customerFactory->fake();
        $version = $this->versionFactory->fake();
        $vin = null;
        $domain = $this->carDomainFactory->fake();

        $this->carService->create($customer, $version, $vin, $domain);
    }

    public function test_car_service_create_invalid_car_domain()
    {
        $this->expectException(ServiceException::class);

        $customer = $this->customerFactory->fake();
        $version = $this->versionFactory->fake();
        $vin = $this->vinFactory->fake();
        $domain = null;

        $this->carService->create($customer, $version, $vin, $domain);
    }

    public function test_car_service_create_write_repository_failed()
    {
        $this->expectException(ServiceException::class);

        $this->carRepository
            ->shouldReceive('save')
            ->once()
            ->andThrow(WriteRepositoryException::class, new MessageBag([]));

        $customer = $this->customerFactory->fake();
        $version = $this->versionFactory->fake();
        $vin = $this->vinFactory->fake();
        $domain = $this->carDomainFactory->fake();

        $this->carService->create($customer, $version, $vin, $domain);
    }

    public function test_car_service_create_failed()
    {
        $this->expectException(ServiceException::class);

        $this->carRepository
            ->shouldReceive('save')
            ->once()
            ->andThrow(\Exception::class);

        $customer = $this->customerFactory->fake();
        $version = $this->versionFactory->fake();
        $vin = $this->vinFactory->fake();
        $domain = $this->carDomainFactory->fake();

        $this->carService->create($customer, $version, $vin, $domain);
    }

    public function test_car_service_create_success()
    {
        $car = $this->carFactory->fake();
        $customer = $this->customerFactory->fake();
        $version = $this->versionFactory->fake();
        $vin = $this->vinFactory->fake();
        $domain = $this->carDomainFactory->fake();

        $this->carRepository
            ->shouldReceive('save')
            ->once()
            ->andReturn($car);

        $newCar = $this->carService->create($customer, $version, $vin, $domain);

        $this->assertInstanceOf(Car::class, $newCar);
    }

    public function test_car_service_add_trajectory_invalid()
    {
        $this->expectException(ServiceException::class);

        $car = $this->carFactory->fake();

        $this->carService->addTrajectory($car, null);
    }

    public function test_car_service_add_trajectory_write_repository_failed()
    {
        $this->expectException(ServiceException::class);

        $this->carRepository
            ->shouldReceive('save')
            ->once()
            ->andThrow(WriteRepositoryException::class, new MessageBag([]));

        $car = $this->carFactory->fake();
        $trajectory = $this->faker->numberBetween(1, 999999);

        $this->carService->addTrajectory($car, $trajectory);
    }

    public function test_car_service_add_trajectory_failed()
    {
        $this->expectException(ServiceException::class);

        $this->carRepository
            ->shouldReceive('save')
            ->once()
            ->andThrow(\Exception::class);

        $car = $this->carFactory->fake();
        $trajectory = $this->faker->numberBetween(1, 999999);

        $this->carService->addTrajectory($car, $trajectory);
    }

    public function test_car_service_add_trajectory_success()
    {
        $car = $this->carFactory->fake();

        $this->carRepository
            ->shouldReceive('save')
            ->once()
            ->andReturn($car);

        $trajectory = $this->faker->numberBetween(1, 999999);

        $trajectoryEntry = $this->carService->addTrajectory($car, $trajectory);

        $this->assertEquals($trajectoryEntry->getTrajectory()->__toString(), $trajectory);
        $this->assertCount(1, $car->getTrajectoryEntries()->values());
        $this->assertInstanceOf(TrajectoryEntry::class, $car->getTrajectoryEntries()->first());
    }
}

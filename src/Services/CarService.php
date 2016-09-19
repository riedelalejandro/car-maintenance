<?php

namespace CarMaintenance\Services;

use CarMaintenance\Entities;
use CarMaintenance\Events\Services\CarCreated;
use CarMaintenance\Events\Services\CarTrajectoryAdded;
use CarMaintenance\Exceptions\Repositories\RepositoryException;
use CarMaintenance\Exceptions\Services\ServiceException;
use CarMaintenance\Exceptions\ValueObjects\ValueObjectException;
use CarMaintenance\Repositories;
use CarMaintenance\ValueObjects;
use Illuminate\Support\MessageBag;

/**
 * Class CarService.
 */
class CarService
{
    /**
     * @var Repositories\CarRepository
     */
    private $cars;

    /**
     * CarService constructor.
     *
     * @param Repositories\CarRepository $cars
     */
    public function __construct(Repositories\CarRepository $cars)
    {
        $this->cars = $cars;
    }

    /**
     * @param Entities\Customer $customer
     * @param Entities\Version  $version
     * @param $plainVin
     * @param $plainCarDomain
     *
     * @return Entities\Car
     *
     * @throws ServiceException
     */
    public function create(Entities\Customer $customer, Entities\Version $version, $plainVin, $plainCarDomain)
    {
        try {
            $vin = new ValueObjects\Vin($plainVin);
            $carDomain = new ValueObjects\CarDomain($plainCarDomain);

            $car = new Entities\Car($customer, $version, $vin, $carDomain);

            $this->cars->save($car);
        } catch (ValueObjectException $e) {
            throw new ServiceException($e->getErrors());
        } catch (RepositoryException $e) {
            throw new ServiceException($e->getErrors());
        } catch (\Exception $e) {
            throw new ServiceException(new MessageBag([$e->getMessage()]));
        }

        event(new CarCreated($car));

        return $car;
    }

    /**
     * @param Entities\Car $car
     * @param $trajectory
     *
     * @return Entities\TrajectoryEntry
     *
     * @throws ServiceException
     */
    public function addTrajectory(Entities\Car $car, $trajectory)
    {
        try {
            $trajectory = new ValueObjects\Trajectory($trajectory);

            $trajectoryEntry = $car->addTrajectoryEntry($trajectory);

            $this->cars->save($car);
        } catch (ValueObjectException $e) {
            throw new ServiceException($e->getErrors());
        } catch (RepositoryException $e) {
            throw new ServiceException($e->getErrors());
        } catch (\Exception $e) {
            throw new ServiceException(new MessageBag([$e->getMessage()]));
        }

        event(new CarTrajectoryAdded($trajectoryEntry));

        return $trajectoryEntry;
    }

    public function addPeriodicTrajectory(Entities\Car $car, $trajectory, $year, $month)
    {
        try {
            $trajectory = new ValueObjects\Trajectory($trajectory);
            $period = new ValueObjects\PeriodicTrajectoryPeriod($year, $month);

            $periodicTrajectory = $car->addPeriodicTrajectory($trajectory, $period);

            $this->cars->save($car);
        } catch (ValueObjectException $e) {
            throw new ServiceException($e->getErrors());
        } catch (RepositoryException $e) {
            throw new ServiceException($e->getErrors());
        } catch (\Exception $e) {
            throw new ServiceException(new MessageBag([$e->getMessage()]));
        }

//        event(new CarPeriodicTrajectoryAdded($periodicTrajectory));

        return $periodicTrajectory;
    }
}

<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\CarDomain;
use CarMaintenance\ValueObjects\CarStatus;
use CarMaintenance\ValueObjects\Trajectory;
use CarMaintenance\ValueObjects\PeriodicTrajectoryPeriod;
use CarMaintenance\ValueObjects\Vin;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Support\Collection;

/**
 * Class Car.
 */
class Car
{
    use Identifiable;
    use Timestamps;

    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Version
     */
    private $version;
    /**
     * @var CarStatus
     */
    private $carStatus;
    /**
     * @var TrajectoryEntry[]|ArrayCollection
     */
    private $trajectoryEntries;
    /**
     * @var PeriodicTrajectory[]|ArrayCollection
     */
    private $periodicTrajectories;
    /**
     * @var Reminder[]|ArrayCollection
     */
    private $reminders;
    /**
     * @var Booking[]|ArrayCollection
     */
    private $bookings;
    /**
     * @var Vin
     */
    private $vin;
    /**
     * @var CarDomain
     */
    private $carDomain;
    /**
     * @var Trajectory|null
     */
    private $monthlyTrajectory;

    /**
     * Car constructor.
     *
     * @param Customer  $customer
     * @param Version   $version
     * @param Vin       $vin
     * @param CarDomain $carDomain
     */
    public function __construct(Customer $customer, Version $version, Vin $vin, CarDomain $carDomain)
    {
        $this->customer = $customer;
        $this->version = $version;
        $this->carStatus = CarStatus::active();
        $this->vin = $vin;
        $this->carDomain = $carDomain;

        $this->trajectoryEntries = new ArrayCollection();
        $this->periodicTrajectories = new ArrayCollection();
        $this->reminders = new ArrayCollection();
        $this->bookings = new ArrayCollection();
    }

    /**
     * @param Trajectory $trajectory
     *
     * @return TrajectoryEntry
     */
    public function addTrajectoryEntry(Trajectory $trajectory)
    {
        $trajectoryEntry = new TrajectoryEntry($this, $trajectory);

        $this->trajectoryEntries->add($trajectoryEntry);

        return $trajectoryEntry;
    }

    /**
     * @return TrajectoryEntry[]|Collection
     */
    public function getTrajectoryEntries()
    {
        return new Collection($this->trajectoryEntries->getValues());
    }

    /**
     * @param Trajectory               $trajectory
     * @param PeriodicTrajectoryPeriod $periodicTrajectoryPeriod
     *
     * @return PeriodicTrajectory
     */
    public function addPeriodicTrajectory(Trajectory $trajectory, PeriodicTrajectoryPeriod $periodicTrajectoryPeriod)
    {
        $periodicTrajectory = new PeriodicTrajectory($this, $trajectory, $periodicTrajectoryPeriod);

        $this->periodicTrajectories->add($periodicTrajectory);

        return $periodicTrajectory;
    }

    /**
     * @return PeriodicTrajectory[]|Collection
     */
    public function getPeriodicTrajectories()
    {
        return new Collection($this->periodicTrajectories->getValues());
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return Version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return CarStatus
     */
    public function getCarStatus()
    {
        return $this->carStatus;
    }

    /**
     * @return Vin
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * @return CarDomain
     */
    public function getCarDomain()
    {
        return $this->carDomain;
    }

    /**
     * @return Trajectory|null
     */
    public function getMonthlyTrajectory()
    {
        return $this->monthlyTrajectory;
    }

    /**
     * @param Version $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @param Vin $vin
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
    }

    /**
     * @param CarDomain $carDomain
     */
    public function setCarDomain($carDomain)
    {
        $this->carDomain = $carDomain;
    }

    /**
     * @param Trajectory|null $monthlyTrajectory
     */
    public function setMonthlyTrajectory($monthlyTrajectory)
    {
        $this->monthlyTrajectory = $monthlyTrajectory;
    }
}

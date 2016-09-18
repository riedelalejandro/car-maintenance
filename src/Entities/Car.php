<?php

namespace CarMaintenance\Entities;

use CarMaintenance\Traits\Entities\Identifiable;
use CarMaintenance\Traits\Entities\Timestamps;
use CarMaintenance\ValueObjects\CarDomain;
use CarMaintenance\ValueObjects\CarStatus;
use CarMaintenance\ValueObjects\Trajectory;
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
     * @var TrajectoryPrediction[]|ArrayCollection
     */
    private $trajectoryPredictions;
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
        $this->trajectoryPredictions = new ArrayCollection();
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
}

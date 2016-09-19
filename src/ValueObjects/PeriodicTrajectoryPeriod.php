<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use Illuminate\Support\Facades\Validator;

/**
 * Class PeriodicTrajectoryPeriod.
 */
class PeriodicTrajectoryPeriod
{
    /**
     * @var int
     */
    private $year;
    /**
     * @var int
     */
    private $month;

    /**
     * PeriodicTrajectoryPeriod constructor.
     *
     * @param int $year
     * @param int $month
     *
     * @throws CreateValueObjectException
     */
    public function __construct($year, $month)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make(['year' => $year, 'month' => $month], [
            'year' => 'required|numeric|between:'.(date('Y') - 1).','.(date('Y') + 1),
            'month' => 'required|numeric|between:1,12',
        ]);

        if ($validator->fails()) {
            throw new CreateValueObjectException($validator->errors());
        }

        $this->year = $year;
        $this->month = $month;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }
}

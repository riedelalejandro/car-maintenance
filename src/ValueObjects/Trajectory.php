<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use Illuminate\Support\Facades\Validator;

/**
 * Class Trajectory.
 */
class Trajectory
{
    /**
     * @var int
     */
    private $trajectory;

    public function __construct($trajectory)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make(['trajectory' => $trajectory], [
            'trajectory' => 'required|numeric|between:1,999999',
        ]);

        if ($validator->fails()) {
            throw new CreateValueObjectException($validator->errors());
        }

        $this->trajectory = $trajectory;
    }

    /**
     * @return int
     */
    public function __toString()
    {
        return $this->trajectory;
    }
}

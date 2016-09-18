<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use Illuminate\Support\Facades\Validator;

/**
 * Class Vin.
 */
class Vin
{
    /**
     * @var string
     */
    private $vin;

    /**
     * Vin constructor.
     *
     * @param $vin
     *
     * @throws CreateValueObjectException
     */
    public function __construct($vin)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make(['vin' => $vin], [
            'vin' => 'required',
            // TODO. Vin validation rules
        ]);

        if ($validator->fails()) {
            throw new CreateValueObjectException($validator->errors());
        }

        $this->vin = $vin;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->vin;
    }
}

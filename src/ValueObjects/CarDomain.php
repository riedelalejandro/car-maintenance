<?php

namespace CarMaintenance\ValueObjects;

use CarMaintenance\Exceptions\ValueObjects\CreateValueObjectException;
use Illuminate\Support\Facades\Validator;

/**
 * Class CarDomain.
 */
class CarDomain
{
    /**
     * @var string
     */
    private $domain;

    /**
     * CarDomain constructor.
     *
     * @param string $domain
     *
     * @throws CreateValueObjectException
     */
    public function __construct($domain)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make(['domain' => $domain], [
            'domain' => 'required',
            // TODO. Domain validation rules
        ]);

        if ($validator->fails()) {
            throw new CreateValueObjectException($validator->errors());
        }

        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->domain;
    }
}

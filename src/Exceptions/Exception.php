<?php

namespace CarMaintenance\Exceptions;

use Illuminate\Support\MessageBag;

/**
 * Class Exception.
 */
class Exception extends \Exception
{
    /**
     * @var MessageBag
     */
    private $errors;

    /**
     * Exception constructor.
     *
     * @param MessageBag $errors
     */
    public function __construct(MessageBag $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }
}

<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvalidEnumValueException extends Exception
{
    public function __construct(string $message = 'Invalid value of enum', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

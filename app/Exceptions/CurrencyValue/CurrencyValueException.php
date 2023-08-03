<?php

namespace App\Exceptions\CurrencyValue;

use Exception;

class CurrencyValueException extends Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message);
    }
}

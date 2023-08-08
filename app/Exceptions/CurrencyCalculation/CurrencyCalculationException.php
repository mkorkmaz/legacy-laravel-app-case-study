<?php

namespace App\Exceptions\CurrencyCalculation;

use Exception;

class CurrencyCalculationException extends Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message);
    }
}

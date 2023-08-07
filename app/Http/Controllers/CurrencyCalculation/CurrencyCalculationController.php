<?php

namespace App\Http\Controllers\CurrencyCalculation;

use App\Http\Controllers\Controller;
use App\Services\CurrencyCalculation\CurrencyCalculationGetter;
use App\Http\Requests\CurrencyCalculation\CurrencyCalculationRequest;

class CurrencyCalculationController extends Controller
{
    protected $currencyCalculationGetter;
    public function __construct(CurrencyCalculationGetter $currencyCalculationGetter)
    {
        $this->currencyCalculationGetter = $currencyCalculationGetter;
    }

    public function calculateCurrencyByCodeAndAmount(CurrencyCalculationRequest $request)
    {
        $data = $this->currencyCalculationGetter->calculateCurrencyByCodeAndAmount($request);

        return $this->successResponse($data);
    }
}

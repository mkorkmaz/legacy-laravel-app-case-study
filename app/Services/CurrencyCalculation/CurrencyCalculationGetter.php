<?php

namespace App\Services\CurrencyCalculation;

use App\Repositories\CurrencyCalculation\CurrencyCalculationRepository;
use Illuminate\Http\Request;

class CurrencyCalculationGetter
{
    protected $currencyCalculationRepository;
    
    public function __construct(CurrencyCalculationRepository $currencyCalculationRepository)
    {
        $this->currencyCalculationRepository = $currencyCalculationRepository;
    }

    public function calculateCurrencyByCodeAndAmount(Request $request)
    {
        return $this->currencyCalculationRepository->calculateCurrencyByCodeAndAmount($request);
    }
}

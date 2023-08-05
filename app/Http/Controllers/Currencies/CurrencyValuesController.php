<?php

declare(strict_types=1);

namespace App\Http\Controllers\Currencies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CurrencyRepository;
use App\Repositories\CurrencyValuesRepository;
use App\Services\CurrencyValuesService;
use Illuminate\Support\Facades\Crypt;

class CurrencyValuesController extends Controller
{
    private $currencyRepository;
    private $currencyValuesRepository;

    public function __construct(CurrencyRepository $currencyRepository, CurrencyValuesRepository $currencyValuesRepository)
    {
        $this->currencyRepository = $currencyRepository;
        $this->currencyValuesRepository = $currencyValuesRepository;
    }
    public function getCurrencyDetails(Request $request, string $currencyCode)
    {
        $currencyDetails = $this->currencyRepository->getCurrencyDetailsWithCurrencyCode($currencyCode);

        $currencyValues = $this->currencyValuesRepository->getCurrencyValuesWithCurrency($currencyDetails);

        return response()->json(['data' => [
            'currency-details' => $currencyDetails,
            'values' => $currencyValues
        ]], 200);

    }

    public function storeCurrencyValue(Request $request, CurrencyValuesService $currencyValuesService, string $currencyCode)
    {
        $request->validate([
            'currency_value' => 'required|numeric|digits_between:1,6',
        ]);

        $currencyDetails = $this->currencyRepository->getCurrencyDetailsWithCurrencyCode($currencyCode);

        $currencyValues = $currencyValuesService->createCurrencyValue($currencyDetails, $request);


        return response()->json(['data' => [
            'currency-details' => $currencyDetails,
            'value' => $currencyValues
        ]], 200);

    }

}

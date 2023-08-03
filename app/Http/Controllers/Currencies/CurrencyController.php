<?php

declare(strict_types=1);

namespace App\Http\Controllers\Currencies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CurrencyRepository;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    private $currencyRepository;
    private $currencyService;

    public function __construct(CurrencyRepository $currencyRepository, CurrencyService $currencyService)
    {
        $this->currencyRepository   = $currencyRepository;
        $this->currencyService  = $currencyService;
    }
    public function getCurrencies(Request $request)
    {
        $currencyList = $this->currencyRepository->getAllCurrencies();
        return response()->json(['data' => $currencyList], 200);
    }

    public function storeCurrency(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|string|max:3|min:3',
            'long_name' => 'required|string',
            'symbol' => 'required|string|max:3',
        ]);

        $currency = $this->currencyService->createOrFail($request);

        return response()->json(['currency' => $currency]);
    }

    public function updateCurrency(Request $request, string $currencyCode)
    {
        $request->validate([
            'long_name' => 'required|string',
            'symbol' => 'required|string|max:3',
        ]);

        $currency = $this->currencyService->updateOrFail($request, $currencyCode);

        return response()->json(['currency' => $currency]);
    }

}

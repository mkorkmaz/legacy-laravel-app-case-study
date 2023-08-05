<?php

declare(strict_types=1);

namespace App\Http\Controllers\Exchange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CurrencyRepository;
use App\Services\CurrencyService;

class ExchangeController extends Controller
{
    private $currencyRepository;
    private $currencyService;

    public function __construct(CurrencyRepository $currencyRepository, CurrencyService $currencyService)
    {
        $this->currencyRepository   = $currencyRepository;
        $this->currencyService  = $currencyService;
    }

    public function exchange(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|string|max:3|min:3',
            'amount' => 'required|numeric',
        ]);

        $currency = $this->currencyRepository->getCurrencyDetailsWithCurrencyCode($request->currency_code);

        $currencyValue = $this->currencyService->calculateExchangeRate($request, $currency);

        return response()->json(['value' => $currencyValue], 200);
    }
}

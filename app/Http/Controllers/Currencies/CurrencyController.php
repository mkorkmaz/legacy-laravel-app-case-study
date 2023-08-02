<?php

declare(strict_types=1);

namespace App\Http\Controllers\Currencies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CurrencyRepository;

class CurrencyController extends Controller
{
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository    = $currencyRepository;
    }
    public function getCurrencies(Request $request)
    {
        $currencyList = $this->currencyRepository->getAllCurrencies();
        return response()->json(['data' => $currencyList], 200);
    }
}

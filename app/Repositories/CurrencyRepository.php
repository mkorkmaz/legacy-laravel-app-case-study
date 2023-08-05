<?php

namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository
{
    public function getAllCurrencies()
    {
        $currencyList = Currency::all()->toArray();
        return $currencyList;
    }

    public function getCurrencyDetailsWithCurrencyCode(string $currencyCode)
    {
        $currencyDetails = Currency::select(['id', 'long_name', 'currency_code', 'symbol'])->where('currency_code', $currencyCode)->first();

        return $currencyDetails ? $currencyDetails : abort('403', 'Currency Not Found');
    }

}

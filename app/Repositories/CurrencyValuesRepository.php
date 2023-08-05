<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\CurrencyValue;

class CurrencyValuesRepository
{
    public function getAllCurrencies()
    {
        $currencyList = Currency::all()->toArray();
        return $currencyList;
    }

    public function getCurrencyValuesWithCurrency(Currency $currency)
    {
        $values = CurrencyValue::select(['logged_at', 'currency_value'])->where('currency_id', $currency->id)->get();
        $currencyValues = $values->map(static function ($value) {
            return [
                'logged_date' => $value['logged_at'],
                'value' => $value['currency_value']
            ];
        });
        return $currencyValues;
    }

}

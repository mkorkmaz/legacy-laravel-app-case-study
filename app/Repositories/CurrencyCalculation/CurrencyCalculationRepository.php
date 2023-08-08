<?php

namespace App\Repositories\CurrencyCalculation;

use App\Exceptions\CurrencyCalculation\CurrencyCalculationException;
use App\Models\CurrencyValue;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class CurrencyCalculationRepository extends Repository
{
    public function __construct(CurrencyValue $model)
    {
        parent::__construct($model);
    }

    public function calculateCurrencyByCodeAndAmount(Request $request)
    {
        $query = $this->model->newQuery();
        $amount = $request->input('amount');
        $code = $request->input('currency_code');
        $latestCurrencyValue = $query->join('currencies', 'currency_values.currency_id', '=', 'currencies.id')->where('currencies.currency_code', $code)->orderBy('currency_values.logged_at', 'desc')->first();
        if(!$latestCurrencyValue)
        {
            throw new CurrencyCalculationException('No value found for the entered currency');
        }
        $calculatedValue = $latestCurrencyValue->currency_value * $amount;
        return
            [
                'amount' => $amount,
                'currency_value' => $latestCurrencyValue->currency_value,
                'calculated_value' => $calculatedValue,
                'symbol' => $latestCurrencyValue->symbol,
                'last_logged_at' => $latestCurrencyValue->logged_at
            ];
    }
}

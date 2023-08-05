<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\CurrencyValue;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CurrencyValuesService
{
    public function createCurrencyValue(Currency $currency, Request $request)
    {

        $uuid = Str::uuid($currency->id);

        try {
            $currencyValue = CurrencyValue::create([
                'id' => $uuid,
                'currency_id' => $currency->id,
                'currency_value' => $request->currency_value,
                'logged_at' => (new \DateTime('now'))->format(DATE_ATOM),
                'created_at' => (new \DateTime())->format(DATE_ATOM),
                'updated_at' => (new \DateTime())->format(DATE_ATOM),
            ]);
        } catch(Exception $excepiton) {
            \Log::error('Currency Value Create Error');
            \Log::error($excepiton);
            return ('Currency Value Create Failed');
        }

        $value = (object)array('logged_date' => $currencyValue->logged_date, 'value' => $currencyValue->currency_value*100);


        return $value;
    }

}

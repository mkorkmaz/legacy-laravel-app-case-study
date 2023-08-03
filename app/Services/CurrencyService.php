<?php

namespace App\Services;

use App\Models\Currency;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CurrencyService
{
    public function createOrFail(Request $request)
    {

        $user = $request->user();

        $uuid = Str::uuid($request->currency_code);

        try {
            $currency = Currency::create([
                'id' => $uuid,
                'currency_code' => $request->currency_code,
                'long_name' => $request->long_name,
                'symbol' => $request->symbol,
                'created_by' => $user->id,
                'created_at' => (new \DateTime())->format(DATE_ATOM),
                'updated_at' => (new \DateTime())->format(DATE_ATOM),
            ]);
        } catch(Exception $excepiton) {
            \Log::error('Currency Create Error');
            \Log::error($excepiton);
            return ('Currency Create Failed');
        }

        return $currency;
    }

    public function updateOrFail(Request $request, string $currencyCode)
    {

        $user = $request->user();

        $currency = Currency::where('currency_code', $currencyCode)->first();

        if(!$currency) {
            return ('Currency not found!');
        }

        try {
            $currency->long_name = $request->long_name;
            $currency->symbol = $request->symbol;
            $currency->created_by = $user->id;
            $currency->updated_at = (new \DateTime())->format(DATE_ATOM);
            $currency->save();
        } catch(Exception $excepiton) {
            \Log::error('Currency Update Error');
            \Log::error($excepiton);
            return ('Currency Update Failed');
        }

        return $currency;
    }

}

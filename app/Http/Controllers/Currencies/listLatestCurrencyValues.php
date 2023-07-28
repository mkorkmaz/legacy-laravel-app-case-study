<?php
declare(strict_types=1);
namespace App\Http\Controllers\Currencies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\CurrencyValue;
use Illuminate\Support\Collection;
class listLatestCurrencyValues extends Controller
{
    public function __invoke(Request $request, string $currencyCode)
    {
        $currencyDetails = Currency::select(['id', 'long_name', 'currencyCode', 'symbol'])->where('currencyCode', $currencyCode)->first();
        /**
         * @var $values Collection
         */
        $values = CurrencyValue::select(['logged_at', 'currency_value'])->where('currency_id', $currencyDetails->id)->get();
        $currency_values = $values->map(static function($value){
            return [
                'logged_date' => $value['logged_at'],
                'value' => $value['currency_value']*100
            ];
        });
        return response()->json(['data' => [
            'currency-details' => $currencyDetails,
            'values' => $currency_values
        ]], 200);

    }
}

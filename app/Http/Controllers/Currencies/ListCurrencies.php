<?php
declare(strict_types=1);
namespace App\Http\Controllers\Currencies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
class ListCurrencies extends Controller
{
    public function __invoke(Request $request)
    {
        $currency_list = Currency::all()->toArray();
        return response()->json(['data' => $currency_list], 200);
    }
}

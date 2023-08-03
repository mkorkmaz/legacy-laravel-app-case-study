<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Resources\Currency\CurrencyResource;
use App\Services\Currency\CurrencyCreator;
use App\Services\Currency\CurrencyGetter;
use Illuminate\Http\Request;
use App\Http\Requests\Currency\CurrencyCreateRequest;

class CurrencyController extends Controller
{
    protected $currencyGetter;
    protected $currencyCreator;
    public function __construct(CurrencyGetter $currencyGetter,CurrencyCreator $currencyCreator)
    {
        $this->currencyGetter = $currencyGetter;
        $this->currencyCreator = $currencyCreator;
    }

    public function index(Request $request)
    {
        return CurrencyResource::collection($this->currencyGetter->index($request));
    }

    public function getCurrencyByCode(Request $request,$code)
    {
        return CurrencyResource::collection($this->currencyGetter->getCurrencyByCode($request,$code));
    }

    public function store(CurrencyCreateRequest $request)
    {
        $currencyValue = CurrencyResource::make($this->currencyCreator->store($request));

        return $this->successResponse($currencyValue, __('currency_value.created_success'));

    }
}

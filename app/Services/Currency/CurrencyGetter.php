<?php

namespace App\Services\Currency;

use App\Repositories\Currency\CurrencyRepository;
use Illuminate\Http\Request;

class CurrencyGetter
{

    protected $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }


    public function index(Request $request)
    {
        return $this->currencyRepository->index($request);
    }

    public function getCurrencyByCode(Request $request,$code)
    {
        return $this->currencyRepository->getCurrencyByCode($request,$code);
    }
}

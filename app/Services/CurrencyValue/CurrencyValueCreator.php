<?php

namespace App\Services\CurrencyValue;

use App\Repositories\Currency\CurrencyRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\CurrencyValue\CurrencyValueRepository;
use Carbon\Carbon;

class CurrencyValueCreator
{
    protected $currencyValueRepository;
    protected $currencyRepository;


    public function __construct(CurrencyValueRepository $currencyValueRepository,CurrencyRepository $currencyRepository)
    {
        $this->currencyValueRepository = $currencyValueRepository;
        $this->currencyRepository = $currencyRepository;
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $currencyCode = $request->input('currency_code');
        $currencyData = $this->currencyRepository->getCurrencyByCode($request,$currencyCode);
        $decodedCurrencyData = json_decode($currencyData,true);
        $data['currency_id'] = $decodedCurrencyData[0]['id'];
        $dateTimeValue = Carbon::now();
        $formattedDateTime = $dateTimeValue->format('Y-m-d H:i:s');
        $data['logged_at'] = $formattedDateTime;
        return $this->currencyValueRepository->store($data);
    }
}

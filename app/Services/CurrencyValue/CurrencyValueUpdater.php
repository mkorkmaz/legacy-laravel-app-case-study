<?php

namespace App\Services\CurrencyValue;

use App\Repositories\CurrencyValue\CurrencyValueRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exceptions\CurrencyValue\CurrencyValueException;

class CurrencyValueUpdater
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $currencyValueRepository;

    /**
     * Undocumented function
     *
     * @param CurrencyValueRepository $currencyValueRepository
     */
    public function __construct(CurrencyValueRepository $currencyValueRepository)
    {
        $this->currencyValueRepository = $currencyValueRepository;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function updateById(Request $request,$id)
    {
        $checkCurrencyValue = $this->currencyValueRepository->find($id);

        if (!$checkCurrencyValue) {
            throw new CurrencyValueException('Currency value not found');
        }
        $data = $request->all();
        $dateTimeValue = Carbon::now();
        $formattedDateTime = $dateTimeValue->format('Y-m-d H:i:s');
        $data['logged_at'] = $formattedDateTime;
        $data['created_at'] = $formattedDateTime;
        $data['updated_at'] = $formattedDateTime;

        return $this->currencyValueRepository->update($id,$data);
    }
}

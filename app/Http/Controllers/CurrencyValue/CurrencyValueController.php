<?php

namespace App\Http\Controllers\CurrencyValue;

use App\Http\Controllers\Controller;
use App\Services\CurrencyValue\CurrencyValueCreator;
use App\Services\CurrencyValue\CurrencyValueGetter;
use App\Services\CurrencyValue\CurrencyValueUpdater;
use App\Http\Resources\CurrencyValue\CurrencyValueResource;
use App\Services\CurrencyValue\CurrencyValueDeleter;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyValue\CurrencyValueCreateRequest;

class CurrencyValueController extends Controller
{
    protected $currencyValueGetter;
    protected $currencyValueCreator;
    protected $currencyValueUpdater;
    protected $currencyValueDeleter;
    public function __construct(CurrencyValueGetter $currencyValueGetter,CurrencyValueCreator $currencyValueCreator,CurrencyValueUpdater $currencyValueUpdater,CurrencyValueDeleter $currencyValueDeleter)
    {
        $this->currencyValueGetter = $currencyValueGetter;
        $this->currencyValueCreator = $currencyValueCreator;
        $this->currencyValueUpdater = $currencyValueUpdater;
        $this->currencyValueDeleter = $currencyValueDeleter;
    }

    public function getCurrencyValueByCurrencyCode(Request $request,$code)
    {
        return CurrencyValueResource::collection($this->currencyValueGetter->getCurrencyValueByCurrencyCode($request,$code));
    }

    public function store(CurrencyValueCreateRequest $request)
    {
        $currencyValue = CurrencyValueResource::make($this->currencyValueCreator->store($request));

        return $this->successResponse($currencyValue, __('currency_value.created_success'));

    }
    public function updateById(CurrencyValueCreateRequest $request,$id)
    {
        $currencyValue = $this->currencyValueUpdater->updateById($request, $id);

        return $this->successResponse($currencyValue, __('currency_value.updated_success'));
    }

    public function deleteById($id)
    {
        $currencyValue = $this->currencyValueDeleter->deleteById($id);

        return $this->successResponse($currencyValue, __('currency_value.deleted_success'));
    }
}

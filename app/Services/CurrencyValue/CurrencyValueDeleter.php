<?php

namespace App\Services\CurrencyValue;

use App\Repositories\CurrencyValue\CurrencyValueRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Exceptions\CurrencyValue\CurrencyValueException;

class CurrencyValueDeleter
{
    protected $currencyValueRepository;

    public function __construct(CurrencyValueRepository $currencyValueRepository)
    {
        $this->currencyValueRepository = $currencyValueRepository;
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function deleteById($id)
    {
        $checkCurrencyValue = $this->currencyValueRepository->find($id);

        if (!$checkCurrencyValue) {
            throw new CurrencyValueException('Currency value not found');
        }
        return $this->currencyValueRepository->delete($id);
    }
}

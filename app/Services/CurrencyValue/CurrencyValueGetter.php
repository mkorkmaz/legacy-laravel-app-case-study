<?php

namespace App\Services\CurrencyValue;

use App\Repositories\CurrencyValue\CurrencyValueRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CurrencyValueGetter
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
    * @param [type] $code
    * @return void
    */
    public function getCurrencyValueByCurrencyCode(Request $request,$code)
    {
        return $this->currencyValueRepository->getCurrencyValueByCurrencyCode($request,$code);
    }
}

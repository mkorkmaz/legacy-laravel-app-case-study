<?php

namespace App\Repositories\Currency;

use App\Models\Currency;
use App\Repositories\Repository;
use Illuminate\Http\Request;

/**
 * Class AddressRepository
 * @package App\Repositories\Address
 */
class CurrencyRepository extends Repository
{

    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    public function index(Request $request)
    {
        $query = $this->model->newQuery();
        $searchParams = $request->all();
        return $query->get();
    }

    public function getCurrencyByCode(Request $request,$code)
    {
        $query = $this->model->newQuery()->where('currency_code',$code);
        return $query->get();
    }
}

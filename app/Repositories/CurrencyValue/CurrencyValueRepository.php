<?php

namespace App\Repositories\CurrencyValue;

use App\Models\CurrencyValue;
use App\Repositories\Repository;
use Illuminate\Http\Request;

/**
 * Class AddressRepository
 * @package App\Repositories\Address
 */
class CurrencyValueRepository extends Repository
{

    public function __construct(CurrencyValue $model)
    {
        parent::__construct($model);
    }

    public function getCurrencyValueByCurrencyCode(Request $request,$code)
    {
        $query = $this->model->newQuery();
        $query->join('currencies', 'currency_values.currency_id', '=', 'currencies.id')->where('currencies.currency_code', $code);
        return $query->get();
    }
}

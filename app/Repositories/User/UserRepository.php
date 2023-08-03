<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;

/**
 * Class AddressRepository
 * @package App\Repositories\Address
 */
class UserRepository extends Repository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index(Request $request)
    {
        $query = $this->model->newQuery();
        return $query->get();
    }

}

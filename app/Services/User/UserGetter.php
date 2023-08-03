<?php

namespace App\Services\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\CurrencyValue\CurrencyValueRepository;
use App\Repositories\User\UserRepository;

class UserGetter
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index(Request $request)
    {
        return $this->userRepository->index($request);
    }
}

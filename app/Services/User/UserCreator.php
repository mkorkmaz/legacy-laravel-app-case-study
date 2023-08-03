<?php

namespace App\Services\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserCreator
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }



    public function store(Request $request)
    {
        $data = $request->all();
        $this->validator($data)->validate();
        return $this->userRepository->store($data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);
    }
}

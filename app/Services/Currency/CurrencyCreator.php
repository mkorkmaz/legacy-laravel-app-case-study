<?php

namespace App\Services\Currency;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\Currency\CurrencyRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class CurrencyCreator
{
    protected $currencyRepository;


    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $userId = JWTAuth::parseToken()->getPayload()->get('sub');
            $data['created_by'] = $userId;
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $this->currencyRepository->store($data);
    }
}

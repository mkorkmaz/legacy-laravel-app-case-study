<?php

namespace App\Http\Resources\Currency;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'long_name' => $this->long_name,
            'currency_code' => $this->currency_code,
            'symbol' => $this->symbol,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ];
    }
}

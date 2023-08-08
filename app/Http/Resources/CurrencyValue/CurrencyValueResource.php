<?php

namespace App\Http\Resources\CurrencyValue;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyValueResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'currency_value' => $this->currency_value,
            'currency_id' => $this->currency_id,
            'logged_at' => $this->logged_at,
            'created_at' => $this->created_at,
            'currency_name' => $this->currency->long_name,
            'symbol' => $this->currency->symbol
        ];
    }
}

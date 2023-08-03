<?php

namespace App\Http\Requests\CurrencyValue;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CurrencyValueCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'currency_value' => ['required', 'numeric'],
            'currency_code' => ['required', 'string','exists:App\Models\Currency,currency_code'],
        ];
        return $rules;
    }
}

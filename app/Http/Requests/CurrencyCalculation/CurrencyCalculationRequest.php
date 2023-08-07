<?php

namespace App\Http\Requests\CurrencyCalculation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CurrencyCalculationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'amount' => ['required', 'numeric','min:1'],
            'currency_code' => ['required', 'string','exists:App\Models\Currency,currency_code'],
        ];
        return $rules;
    }
}

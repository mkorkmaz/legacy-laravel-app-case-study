<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CurrencyCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'long_name' => ['required', 'string'],
            'currency_code' => ['required','max:3' ,'string',Rule::unique('currencies', 'currency_code')],
            'symbol' => ['required', 'string'],
        ];
        return $rules;
    }
}

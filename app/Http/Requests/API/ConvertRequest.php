<?php

namespace App\Http\Requests\API;

use App\Http\Requests\Request;

/**
 * Class ConvertRequest
 *
 * @package App\Http\Requests\API
 */
class ConvertRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from_currency_id' => 'bail | required | exists:currencies,id',
            'to_currency_id' => 'bail | required | exists:currencies,id',
            'amount' => 'bail | required | numeric',
        ];
    }
}

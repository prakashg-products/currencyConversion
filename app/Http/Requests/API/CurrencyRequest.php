<?php

namespace App\Http\Requests\API;

use App\Http\Requests\Request;

/**
 * Class CurrencyRequest
 *
 * @package App\Http\Requests\API
 */
class CurrencyRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail | required',
            'code' => 'bail | required | unique:currencies,code,'. $this->id . ',id',
            'amount' => 'bail | required | numeric',
            'wrtid' => 'bail | required | exists:currencies,id'
        ];
    }
}

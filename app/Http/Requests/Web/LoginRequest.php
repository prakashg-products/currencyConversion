<?php

namespace App\Http\Requests\Web;

use App\Http\Requests\Request;

/**
 * Class LoginRequest
 *
 * @package App\Http\Requests\Web
 */
class LoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'bail | required | email',
            'password' => 'bail | required'
        ];
    }
}

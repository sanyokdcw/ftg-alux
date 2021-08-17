<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallDataRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => ['required', 'filled', 'string', 'max:90'],
            'email' => ['required', 'filled', 'email', 'string', 'max:90'],
            'phone' => ['required', 'filled', 'string', 'max:90'],
            'question' => ['required', 'string', 'max:8000']
        ];
    }
}

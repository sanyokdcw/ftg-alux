<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'filled', 'string', 'max:90'],
            'surname' => ['required', 'filled', 'string', 'max:90'],
            'middle_name' => ['required', 'filled', 'string', 'max:90'],
            'email' => ['required', 'filled', 'email', 'string', 'max:90'],
            'phone' => ['required', 'filled', 'string', 'max:90'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormDataRequest extends FormRequest
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
            'fullname'                            => ['required', 'filled', 'string'],
            'number'                              => ['required', 'filled', 'string'],
            'email'                               => ['required', 'filled', 'email'],
            # water
            'water_source'                        => ['required', 'filled', 'string', 'max:255'],
            'water_request'                       => ['nullable', 'filled', 'string', 'max:255'],
            # input_water
            'input_water.mutnost_user'            => ['required', 'filled', 'numeric'],
            'input_water.mutnost_standart'        => ['required', 'filled', 'numeric'],
            'input_water.permangant_user'         => ['required', 'filled', 'numeric'],
            'input_water.permangant_standart'     => ['required', 'filled', 'numeric'],
            'input_water.zhestkost_user'          => ['required', 'filled', 'numeric'],
            'input_water.zhestkost_standart'      => ['required', 'filled', 'numeric'],
            'input_water.zhelezo_user'            => ['required', 'filled', 'numeric'],
            'input_water.zhelezo_standart'        => ['required', 'filled', 'numeric'],
            'input_water.serovodorod_user'        => ['required', 'filled', 'numeric'],
            'input_water.serovodorod_standart'    => ['required', 'filled', 'numeric'],
            'input_water.nitrat_user'             => ['required', 'filled', 'numeric'],
            'input_water.nitrat_standart'         => ['required', 'filled', 'numeric'],
            'input_water.ostatok_user'            => ['required', 'filled', 'numeric'],
            'input_water.ostatok_standart'        => ['required', 'filled', 'numeric'],
            # purified_water
            'purified_water.mutnost_user'         => ['required', 'filled', 'numeric'],
            'purified_water.mutnost_standart'     => ['required', 'filled', 'numeric'],
            'purified_water.permangant_user'      => ['required', 'filled', 'numeric'],
            'purified_water.permangant_standart'  => ['required', 'filled', 'numeric'],
            'purified_water.zhestkost_user'       => ['required', 'filled', 'numeric'],
            'purified_water.zhestkost_standart'   => ['required', 'filled', 'numeric'],
            'purified_water.zhelezo_user'         => ['required', 'filled', 'numeric'],
            'purified_water.zhelezo_standart'     => ['required', 'filled', 'numeric'],
            'purified_water.serovodorod_user'     => ['required', 'filled', 'numeric'],
            'purified_water.serovodorod_standart' => ['required', 'filled', 'numeric'],
            'purified_water.nitrat_user'          => ['required', 'filled', 'numeric'],
            'purified_water.nitrat_standart'      => ['required', 'filled', 'numeric'],
            'purified_water.ostatok_user'         => ['required', 'filled', 'numeric'],
            'purified_water.ostatok_standart'     => ['required', 'filled', 'numeric'],
            # performance
            'performance.day'                     => ['required', 'filled', 'numeric'],
            'performance.month'                   => ['required', 'filled', 'numeric']
        ];
    }
}

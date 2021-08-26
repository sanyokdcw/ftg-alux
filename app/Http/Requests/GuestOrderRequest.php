<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestOrderRequest extends FormRequest
{
    protected const ORDER_CREATED = 'В обработке';

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
            'name' => ['required'],
            'surname' => ['required'],
            'telephone' => ['required'],
            'mail' => ['required'],
            'delivery_0' => ['required'],
            'delivery_1' => ['required'],
            'delivery_2' => ['required'],
            'payment' => ['required'],
            'comment' => ['required'],
            'sum'=> ['required  '],
            'products' => ['required'],
            'quantities' => ['required'],
        ];
    }

    public function validated()
    {
        $validated = $this->validator->validated();

        if ($this->has('delivery_0')) {
            $validated['city'] = $this->delivery_0;
        }
        if ($this->has('delivery_1')) {
            $validated['branch'] = $this->delivery_1;
        }
        if ($this->has('delivery_2')) {
            $validated['department'] = $this->delivery_2;
        }

        $validated['status'] = self::ORDER_CREATED;

        return $validated;
    }

    public function messages()
    {
        return [
            'name.required' => 'Обязательное поле',
            'surname.required' => 'Обязательное поле',
            'telephone.required' => 'Обязательное поле',
            'mail.required' => 'Обязательное поле',
            'delivery_0.required' => 'Обязательное поле',
            'delivery_1.required' => 'Обязательное поле',
            'delivery_2.required' => 'Обязательное поле',
            'payment.required' => 'Обязательное поле',
            'comment.required' => 'Обязательное поле'
        ];
    }
}
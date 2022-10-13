<?php

namespace App\Http\Requests\CarUser;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'int',
                'exists:users,id',
            ],
            'car_id' => [
                'required',
                'int',
                'exists:cars,id',
            ],
        ];
    }
}

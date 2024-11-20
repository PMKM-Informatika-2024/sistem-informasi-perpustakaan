<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "role_id" => "required|exists:roles,id",
            "name" => "required|unique:users,name",
            "username" => "required|unique:users,username",
            "phone_number" => "required|numeric|unique:users,phone_number|phone:ID",
        ];
    }
}

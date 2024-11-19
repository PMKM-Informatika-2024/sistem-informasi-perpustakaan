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
            "name" => "required|unique:users,name",
            "email" => "required|email:dns|unique:users,email",
            "phone_number" => "required|numeric|unique:users,phone_number|phone:ID",
            "role_id" => "required|exists:roles,id",
            "address" => "required|string|max:255"
        ];
    }
}

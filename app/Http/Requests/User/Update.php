<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Container\Attributes\RouteParameter;
use App\Models\User;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(#[RouteParameter("user")] User $user)
    {
        return [
            "name" => ["required", Rule::unique("users", "name")->ignore($user->id)],
            "email" => ["required", "email:dns", Rule::unique("users", "email")->ignore($user->id)],
            "phone_number" => ["required", "numeric", Rule::unique("users", "phone_number")->ignore($user->id), "phone:ID"],
            "address" => "required|string|max:255"
        ];
    }
}

<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Container\Attributes\RouteParameter;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(#[RouteParameter('user')] User $user)
    {
        return [
            'name' => ['required', Rule::unique('users', 'name')->ignore($user->id)],
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id)],
            'phone_number' => ['required', 'numeric', Rule::unique('users', 'phone_number')->ignore($user->id), 'phone:ID'],
        ];
    }
}

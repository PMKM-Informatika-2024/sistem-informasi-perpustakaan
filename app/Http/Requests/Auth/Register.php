<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'phone_number' => 'required|numeric|unique:users,phone_number',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ];
    }
}

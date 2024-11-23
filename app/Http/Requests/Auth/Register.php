<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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

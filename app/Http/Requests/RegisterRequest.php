<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return ! Auth::check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'phone_number' => 'required|numeric|unique:users,phone_number',
            'address' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ];
    }
}

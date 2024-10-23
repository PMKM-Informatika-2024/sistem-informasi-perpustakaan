<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return ! Auth::check();
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email:dns',
            'password' => 'required',
        ];
    }
}

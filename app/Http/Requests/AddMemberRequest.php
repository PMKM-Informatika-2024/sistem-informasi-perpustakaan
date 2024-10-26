<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can("add member");
    }

    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => "required|email:dns|unique:users,email",
            "phone_number" => "required|numeric",
            "address" => "required",
            "role_id" => "required|exists:roles,id",
        ];
    }
}

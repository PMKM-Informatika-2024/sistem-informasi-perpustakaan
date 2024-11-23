<?php

namespace App\Http\Requests\Category;

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
            'name' => 'required|unique:categories,name',
            'description' => 'required|string|max:255',
        ];
    }
}

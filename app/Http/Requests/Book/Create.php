<?php

namespace App\Http\Requests\Book;

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
            "category_id" => "required|exists:categories,id",
            "title" => "required|max:255|unique:books,title",
            "publisher" => "required",
            "year" => "required|numeric"
        ];
    }
}

<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;
use Illuminate\Container\Attributes\RouteParameter;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(#[RouteParameter("book")] Book $book)
    {
        return [
            "category_id" => "required|exists:categories,id",
            "title" => ["required", "max:255", Rule::unique("books", "title")->ignore($book->id)],
            "publisher" => "required",
            "year" => "required|numeric"
        ];
    }
}

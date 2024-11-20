<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Container\Attributes\RouteParameter;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(#[RouteParameter("category")] Category $category)
    {
        return [
            "name" => ["required", Rule::unique("categories", "name")->ignore($category->id)],
            "description" => "required|string|max:255"
        ];
    }
}

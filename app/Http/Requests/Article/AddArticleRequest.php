<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class AddArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                'max:255',
            ],
            'description' => [
                'required',
                'min:25',
            ]
        ];
    }
}

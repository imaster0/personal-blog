<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'full_text' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'tags' => 'present'
        ];
    }

    public function articleFields()
    {
        return [
            'title' => $this->title,
            'full_text' => $this->full_text,
            'category_id' => $this->category_id,
            'image' => $this->image
        ];
    }
}

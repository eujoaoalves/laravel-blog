<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => "required|string|min:3|max:30",
            'body' => "required|string|min:10|max:255",
            'category_id' => 'required',
            // 'post-cover' => 'file|mimetypes:jpeg,png,svg'
        ];
    }
    public function messages(): array
{
    return [
        'title.required' => 'Please enter a title for your post',
        'title.min' => 'Your title must be at least :min characters',
        'title.max' => 'Your title cannot be longer than :max characters',
        'body.required' => 'Please enter some content for your post',
        'body.min' => 'Your content must be at least :min characters',
        'body.max' => 'Your content cannot be longer than :max characters',
        'category.required' => 'Please choose a category for your post',
        'file' => 'The post cover must be a file.',
        'mimetypes' => 'The :attribute must be a file of type: :values.'

    ];
}
}

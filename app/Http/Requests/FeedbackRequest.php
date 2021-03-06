<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'captcha' => 'required|captcha',
            'name' => 'required|string|min:3|max:100',
            'question' => 'required|string|min:10|max:200',
            'email' => 'required|email',
            'files' => 'array|max:3',
            'files.*' => 'mimetypes:text/*'
        ];
    }
}

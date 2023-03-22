<?php

namespace App\Http\Requests\Admin\newsletter;

use Illuminate\Foundation\Http\FormRequest;

class ComposeRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:100',
            'newsletter_image' => 'required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
            'link' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:10|max:255',
        ];
    }
}

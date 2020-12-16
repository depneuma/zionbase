<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HeroUpdateRequest extends FormRequest
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
            'line_one' => ['required', 'max:27', 'string'],
            'line_two' => ['required', 'max:35', 'string'],
            'line_three' => ['required', 'max:150', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2000'],
        ];
    }
}

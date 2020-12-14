<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'max:255', 'string'],
            'body' => ['required', 'max:255', 'string'],
            'image' => ['required', 'file', 'max:2000', 'mimes:jpg,jpeg,png'],
        ];
    }
}

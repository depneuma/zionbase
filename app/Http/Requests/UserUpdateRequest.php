<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'string'],
            'office' => ['required', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'mobile' => ['required', 'min:11', 'max:15', 'string'],
            'about' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id)],
            'avatar' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2000'],
            'roles' => 'array',
        ];
    }
}

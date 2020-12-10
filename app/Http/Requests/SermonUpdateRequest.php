<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SermonUpdateRequest extends FormRequest
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
            'event_id' => ['nullable', 'exists:events,id'],
            'cover' => [
                'required',
                'max:255',
                'mimes:jpg,jpeg,png',
                'file',
                'max:2000',
            ],
            'audio' => [
                'required',
                'max:255',
                'file',
                'mimetypes:audio/mpeg',
                'max:20000',
            ],
            'video' => [
                'nullable',
                'max:255',
                'file',
                'mimetypes:video/mp4',
                'max:20000',
            ],
            'pdf' => ['nullable', 'max:255', 'file', 'mimes:pdf', 'max:10000'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'price' => ['required', 'in:Free'],
        ];
    }
}
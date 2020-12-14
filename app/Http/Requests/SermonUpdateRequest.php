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
            'photo' => ['required', 'file'],
            'event_id' => ['nullable', 'exists:events,id'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'price' => ['required', 'in:Free'],
            'audio' => ['required', 'file', 'max:20000', 'mimes:audio/mpeg'],
            'video' => ['nullable', 'max:255', 'string'],
            'pdf' => [
                'nullable',
                'max:255',
                'file',
                'max:10000',
                'mimetypes:application/pdf',
            ],
        ];
    }
}

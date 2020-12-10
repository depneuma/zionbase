<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
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
            'rsvp_three_id' => ['nullable', 'max:255'],
            'rsvp_two_id' => ['nullable', 'max:255'],
            'cover' => [
                'nullable',
                'max:255',
                'file',
                'mimes:jpg,jpeg,png',
                'max:2000',
            ],
            'rsvp_one_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'venue' => ['required', 'max:255', 'string'],
            'schedule' => ['required', 'max:255', 'string'],
            'time' => ['required', 'date_format:H:i:s'],
        ];
    }
}

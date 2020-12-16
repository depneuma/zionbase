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
            'rsvp_one_id' => ['required', 'exists:users,id'],
            'rsvp_two_id' => ['nullable', 'exists:users,id'],
            'rsvp_three_id' => ['nullable', 'exists:users,id'],
            'cover' => [
                'required',
                'max:255',
                'mimes:jpg,jpeg,png',
                'max:2000',
                'file',
            ],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'schedule' => ['required', 'max:255', 'string'],
            'venue' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'date_time' => ['required', 'date', 'date'],
        ];
    }
}

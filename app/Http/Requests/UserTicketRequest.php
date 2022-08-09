<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTicketRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'department_id' => 'required',
            'service_id' => 'nullable',
            'note' => 'nullable',
            'message' => 'nullable',
        ];
    }
}

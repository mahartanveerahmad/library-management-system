<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorestudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'semester' => 'required|string|max:20',
            'department' => 'nullable|string|max:100',
            'student_session' => 'required|string|unique:students,student_session',
        ];
    }
}

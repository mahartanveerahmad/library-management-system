<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatestudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
   public function rules()
{
    $studentId = $this->route('student'); 
   dd([
    'route_student' => $this->route('student'),
    'all' => $this->all(),
]);

    return [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'gender' => 'required|in:male,female,other',
        'semester' => 'required|string|max:100',
        'age' => 'required|numeric|min:1',
        'phone' => 'required|string|max:15',
        'email' => [
            'required',
            'email',
            Rule::unique('students', 'email')->ignore($studentId),
        ],
        'student_session' => [
            'required',
            Rule::unique('students', 'student_session')->ignore($studentId),
        ],
        'department' => 'required|string|max:255',
    ];
}
}

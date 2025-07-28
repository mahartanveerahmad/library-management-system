<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', [
            'students' => Student::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestudentRequest $request)
    {
        Student::create($request->validated());
        return redirect()->route('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'semester' => 'required|string|max:100',
            'department' => 'required|string|max:255',
            'student_session' => [
                'required',
                Rule::unique('students')->ignore($student->id),
            ],
            'age' => 'required|integer|min:1',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);
        $student->update($request->all());
        return redirect()->route('students')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('students');
    }
}

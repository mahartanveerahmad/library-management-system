@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Update Student</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('student.update', $student->id) }}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $student->address }}" required>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" name="semester" value="{{ $student->semester }}" required>
                            @error('semester')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" name="department" value="{{ $student->department }}">
                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Student Session</label>
                            <input type="text" class="form-control" name="student_session" value="{{ $student->student_session }}" required>
                            @error('student_session')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" class="form-control" name="age" value="{{ $student->age }}" required>
                            @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $student->phone }}" required>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $student->email }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-danger" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

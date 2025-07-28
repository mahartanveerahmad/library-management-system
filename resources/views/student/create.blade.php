@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Add Student</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('students') }}">All Students</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('student.store') }}" method="post" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control" placeholder="Student Name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="address"
                                value="{{ old('address') }}" required>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Replaced "Class" with "Semester" --}}
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" placeholder="Semester" name="semester"
                                value="{{ old('semester') }}" required>
                            @error('semester')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Added student_session --}}
                        <div class="form-group">
                            <label>Session</label>
                            <input type="text" class="form-control" placeholder="e.g. 2020-2024" name="student_session"
                                value="{{ old('student_session') }}" required>
                            @error('student_session')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ✅ Added department --}}
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" placeholder="Department" name="department"
                                value="{{ old('department') }}">
                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" class="form-control" placeholder="Age" name="age"
                                value="{{ old('age') }}" required>
                            @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" name="save" class="btn btn-danger" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

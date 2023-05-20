@extends('layout')
@section('content')
    
<div class="row">
    <div class="col-lg-11">
        <h2>Update the Student</h2>
    </div>
    <div class="col-lg-1">
        <a href="{{url('/')}}" class="btn btn-primary">Back</a>
    </div>
</div>
<div class="d-flex justify-content-center">
    @if ($errors -> any())
        <div class="alert alert-danger">
            <strong>Errors encountered!</strong>
            <ul>
                @foreach ($errors -> all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{$message}}</strong>
        </div>
    @endif
</div>
<div class="d-flex justify-content-center">
    <form action="{{route('Students.update', $student->id)}}" method="POST" class="w-50">
        {{-- cross site request forgery- prevents attacks --}}
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name." value="{{$student->first_name}}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name." value="{{$student->last_name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email." value="{{$student->email}}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address." value="{{$student->address}}">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Enter Birthday." value="{{$student->birthday}}">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age." value="{{$student->age}}">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="" disabled selected>Select Gender</option>
                <option value="Male" {{$student->gender === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{$student->gender === 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <input type="reset" value="Reset" class="btn btn-secondary">
        <input type="submit" value="Submit" class="btn btn-danger">
    </form>
</div>

@endsection
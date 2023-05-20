@extends('layouts.auth-master')
@section('content')
<div class="d-flex justify-content-center container bg-danger-subtle p-5">
    <form action="{{route('register.perform')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h1 class="h3">Register</h1>
        <div class="form-group">
            <label for="name" class="float-start">Name</label>
            <input type="text" name="name" id="name" placeholder="Please enter your name" class="form-control" required>
            @if ($errors->has('name'))
                <span class="text-danger">Error {{$errors->first('name')}}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="email" class="float-start">Email</label>
            <input type="email" name="email" id="email" placeholder="Please enter your email" class="form-control" required>
            @if ($errors->has('email'))
                <span class="text-danger">Error {{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password" class="float-start">Password</label>
            <input type="password" name="password" id="password" placeholder="Please enter your password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="text-danger">Error {{$errors->first('password')}}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="float-start">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Please confirm your password" class="form-control" required>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger">Error {{$errors->first('password_confirmation')}}</span>
            @endif
        </div>
        <input type="submit" value="Register" class="btn btn-primary">
    </form>
</div>
@endsection
@extends('layouts.auth-master')
@section('content')
<div class="d-flex justify-content-center ">
<div class="d-flex justify-content-center p-5 w-50 border bg-danger-subtle mt-5">
    <form action="{{route('login.perform')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h1 class="h3">Login</h1>
        @include('layouts.partials.messages')
        <div class="form-group">
            <label for="email" class="float-start">Email</label>
            <input type="email" name="email" id="email" placeholder="Please enter your email" class="form-control">
            {{-- @if ($errors->has('email'))
                <span class="text-danger">Error: {{$errors->first('email')}}</span>
            @endif --}}
        </div>
        <div class="form-group">
            <label for="password" class="float-start">Password</label>
            <input type="password" name="password" id="password" placeholder="Please enter your password" class="form-control">
            {{-- @if ($errors->has('password'))
                <span class="text-danger">Error: {{$errors->first('password')}}</span>
            @endif --}}
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
    </form>
</div>
</div>
@endsection
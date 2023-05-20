{{-- foldername.parentfilename --}}
@extends('layouts.app-master')
@section('content')
    <div class="bg-danger-subtle mt-5 p-5 rounded border">
        @auth
            @include('list')        
        @endauth
        
        @guest
            <h1>Homepage</h1>
            <p class="lead">You're viewing the homepage.</p>
        @endguest
    </div>
@endsection
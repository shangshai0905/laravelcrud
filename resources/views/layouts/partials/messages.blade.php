@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::get('success'))
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-warning">
                {{$message}}
            </div>
        @endforeach

    @else
        <div class="alert alert-warning">
            {{$data}}
        </div>
    @endif
@endif
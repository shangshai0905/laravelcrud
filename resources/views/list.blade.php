
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

    <div class="row">
        <div class="col-lg-11">
            <h2 style="text-align: center">List of Students</h2>
        </div>
        <div class="col-lg-1">
            {{-- Students is from app/model --}}
            {{--create is from StudentsController  --}}
            <a href="{{route('Students.create')}}" class="btn btn-success">
                Add Students
            </a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Action</th>
        </thead>
        <tbody>
            {{-- $students is the variable that created from StudentsController --}}
            @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->birthday}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->gender}}</td>
                    <td class="d-flex">
                        <a href="{{route('Students.edit', $student->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('Students.destroy', $student->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@extends('layouts.app')

@section('contents')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h4>students</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('create_student') }}" class="btn btn-primary">Add student</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('partials/alerts')
            @if (count($students) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Course</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_email }}</td>
                                <td>{{ $student->phone_number }}</td>
                                <td>{{ $student->course }}</td>
                                <td>{{ $student->created_at }}</td>
                                <td>
                                    <a href="{{ route('edit_student', $student->id) }}" class="btn btn-primary">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteUser({{ $student->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    No Students Added
                </div>
            @endif

        </div>
    </div>

    @include('partials.modal')

    <script>
        function deleteUser(id) {
            const deleteForm = document.getElementById('delete-form');
            let route = "{{ route('delete_student', ':id') }}";
            route = route.replace(':id', id);
            deleteForm.setAttribute('action', route);
        }
    </script>
@endsection

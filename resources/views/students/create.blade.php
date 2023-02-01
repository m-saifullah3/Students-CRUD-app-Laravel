@extends('layouts.app')

@section('contents')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4>Add Student</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('show_students') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('partials/alerts')
        <form action="{{ route('create_student') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Please enter your name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Please enter your Email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="number">Phone Number</label>
                <input type="number" class="form-control @error('number') is-invalid @enderror" name="number" id="number" value="{{ old('number') }}" placeholder="Please enter your Phone Number">
                @error('number')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course">Course</label>
                <input type="text" class="form-control @error('course') is-invalid @enderror" name="course" id="course" value="{{ old('course') }}" placeholder="Please enter your Course">
                @error('course')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</div>

@endsection

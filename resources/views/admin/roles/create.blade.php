@extends('admin.layout')

@section('content')
    <form action="{{ route('admin.roles.store') }}" method="post">
        @csrf
        <div>
            <label>Name</label>
            <input class="form-control" type="text" name="name" required>
        </div>
        <div>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
@endsection

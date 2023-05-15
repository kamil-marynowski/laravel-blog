@extends('admin.layout')

@section('title') New user @endsection

@section('page-header') New user @endsection

@section('content')
<div class="row">
    <div class="col">
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf

            <label>Name</label>
            <input class="form-control" type="text" name="name" required>

            <label>E-mail</label>
            <input class="form-control" type="email" name="email" required>

            <label>Password</label>
            <input class="form-control" type="password" name="password" required>

            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection

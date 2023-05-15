@extends('admin.layout')

@section('title') Users @endsection

@section('page-header') Users @endsection

@section('content')
<div class="row mb-3">
    <div class="col">
        <a class="btn btn-success" href="{{ route('admin.users.create') }}">
            Create user
        </a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped table-bordered">
            <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.users.edit', ['user' => $user]) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

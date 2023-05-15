@extends('admin.layout')

@section('content')
    <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
        </div>
        <div>
            <label>E-mail</label>
            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
        </div>
        <div>
            <label>Password</label>
            <input class="form-control" type="password" name="password">
        </div>
        <div>
            <label>Role</label>
            <select class="form-select" name="role">
                @foreach($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
@endsection

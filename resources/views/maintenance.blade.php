@extends('layouts.app')
@section('content')
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Account</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row"></th>
                <td>{{ $user->first_name . ' ' . $user->last_name . ' = ' . $user->role->name }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a class="btn btn-warning" href="{{ route('view.update', ['id' => $user->id]) }}">Update Role</a>
                        <form action="{{ route('delete', ['id' => $user->id]) }}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('update', ['id' => $user->id]) }}" method="POST">
            @csrf
            <label for="role" class="form-label">Select Role</label>
            <select class="form-select" id="role" aria-label="Default select example" name="role">
                @foreach($roles as $role)
                <option @if ($user->role_id === $role->id)
                    selected
                @endif value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary ">Save Changes</button>
        </form>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">{{ __('form.table.account') }}</th>
                <th scope="col">{{ __('form.table.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row"></th>
                <td>{{ $user->first_name . ' ' . $user->last_name . ' = ' . $user->role->name }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a class="btn btn-warning" href="{{ route('view.update', ['id' => $user->id]) }}">{{ __('form.table.update') }}</a>
                        <form action="{{ route('delete', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">{{ __('form.table.delete') }}</button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

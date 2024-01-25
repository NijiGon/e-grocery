@extends('layouts.app')
@section('content')
    <div>
        <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('app.form.email') }}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ __('app.form.password') }}</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('app.form.submit') }}</button>
        </form>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $e)
                        <li class="text-danger">{{ $e }}</li>
                    @endforeach
                </ul>

            </div>
        @endif
    </div>
@endsection

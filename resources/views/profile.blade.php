@extends('layouts.app')
@section('content')
    <div>
        <form method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{ asset('assets/' . $user->display_picture) }}" alt="">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('app.form.first') }}</label>
                <input type="name" class="form-control" value="{{ $user->first_name }}"  id="exampleInputEmail1" name="first" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('app.form.last') }}</label>
                <input type="name" class="form-control" value="{{ $user->last_name }}" id="exampleInputEmail1" name="last" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('app.form.email') }}</label>
                <input type="email" class="form-control" value="{{ $user->email }}" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">{{ __('app.form.picture') }}</label>
                <input class="form-control" value="{{ $user->display_picture }}" name="file" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">{{ __('app.form.gender') }}</label>
                <div class="form-check">
                    @foreach($genders as $gender)
                        <input class="form-check-input" type="radio" name="gender" id="gender_{{ $gender->id }}" value="{{ $gender->id }}" @if ($gender->id === $user->gender_id) checked @endif>
                        <label class="form-check-label" for="gender_{{ $gender->id }}">
                            {{ $gender->desc }}
                        </label>
                        <br>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ __('app.form.password') }}</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{ __('app.form.confirmation') }}</label>
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
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

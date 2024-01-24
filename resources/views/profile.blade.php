@extends('layouts.app')
@section('content')
    <div>
        <form method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            <div>
                <img src="{{ asset('assets/' . $user->display_picture) }}" alt="">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="name" class="form-control" value="{{ $user->first_name }}"  id="exampleInputEmail1" name="first" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="name" class="form-control" value="{{ $user->last_name }}" id="exampleInputEmail1" name="last" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" value="{{ $user->email }}" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Display Picture</label>
                <input class="form-control" name="file" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" aria-label="Default select example" name="gender">
                    @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->desc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" value="{{ $user->first_name }}" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" value="{{ $user->first_name }}" class="form-control" name="password_confirmation" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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

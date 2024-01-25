@extends('layouts.app')
@section('content')
    <div>
        <h1>{{ __('app.message.success') }}</h1>
        <a href="{{ route('home') }}">{{ __('app.message.home') }}</a>
    </div>
@endsection

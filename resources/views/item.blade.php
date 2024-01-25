@extends('layouts.app')
@section('content')
    <div>
        <h1>{{ $item->name }}</h1>
        <h2>{{ 'Rp. ' . $item->price . ',-' }}</h2>
        <h3>{{ $item->desc }}</h3>
        <a href="{{ route('cart.add', ['id' => $item->id]) }}" class="btn btn-success">{{ __('app.catalog.add') }}</a>
    </div>
@endsection

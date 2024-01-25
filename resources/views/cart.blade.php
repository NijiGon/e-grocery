@extends('layouts.app')
@section('content')
    <div>
        @if($items !== null && $items->count() > 0)
        <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">{{ __('app.table.name') }}</th>
                <th scope="col">{{ __('app.table.description') }}</th>
                <th scope="col">{{ __('app.table.price') }}</th>
                <th scope="col">{{ __('app.table.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                <th scope="row"></th>
                <td>{{ $item->name }}</td>
                <td class="text-truncate" style="max-width: 500px;">{{ $item->desc }}</td>
                <td>{{ 'Rp. ' . $item->price . ',-' }}</td>
                <td>
                    <a href="{{ route('cart.delete', ['id' => $item->id]) }}" class="btn btn-success ">{{ __('app.table.delete') }}</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <h2>{{ __('app.table.total') }}: {{ 'Rp. ' . $total . ',-'}}</h2>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">{{ __('app.table.checkout') }}</button>
            </form>
        </div>
        @else
        <div>
            <h1>{{ __('app.table.empty') }}</h1>
        </div>
        @endif
    </div>
@endsection

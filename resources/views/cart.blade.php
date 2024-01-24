@extends('layouts.app')
@section('content')
    <div>
        @if($items->count() > 0)
        <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
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
                    <a href="{{ route('cart.delete', ['id' => $item->id]) }}" class="btn btn-success ">Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <h2>Total: {{ 'Rp. ' . $total . ',-'}}</h2>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        </div>
        @else
        <div>
            <h1>Cart is empty</h1>
        </div>
        @endif
    </div>
@endsection

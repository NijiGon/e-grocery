@extends('layouts.app')
@section('content')
    <div>
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
                    <a href="{{ route('item.show', ['id' => $item->id]) }}" class="btn btn-success ">Details</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

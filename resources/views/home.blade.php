@extends('layouts.app')
@section('content')
    <div>
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
                    <a href="{{ route('item.show', ['id' => $item->id]) }}" class="btn btn-success ">{{ __('app.table.detail') }}</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="">
            {{ $items->links() }}
        </div>
    </div>
@endsection

@extends('backend.layouts.main')
@section('title', 'Admins List')
@section('main-container')

<div class="container">
    <div class="ms-5">
        <h2 class="mt-5">Food Items</h2>
        <a href="{{ url('/admin/fitem-add') }}" class="btn btn-primary mb-3">Add New Food Item</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($foodItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    @foreach(json_decode($item->images) as $img)
                    <img src="{{ asset('uploads/fitems/' . $img) }}" alt="Image" width="60">
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('/admin/fitem-edit/' . $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ url('/admin/fitem-delete/' . $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
@extends('backend.layouts.main')
@section('title', 'Admins List')
@section('main-container')

<div class="container">
    <h2>Edit Food Item</h2>

    <form action="{{ route('fitem.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
       @method('PUT')
        <div class="form-group">
            <label>Food Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="form-group">
            <label>Current Images</label><br>
            @foreach(json_decode($item->images) as $img)
                <img src="{{ asset('uploads/fitems/' . $img) }}" width="60" class="mr-2">
            @endforeach
        </div>

        <div class="form-group">
            <label>Upload New Images </label>
            <input type="file" name="images[]" class="form-control" multiple accept=".jpg,.png">
        </div>

        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
</div>


@endsection
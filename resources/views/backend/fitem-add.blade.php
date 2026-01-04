@extends('backend.layouts.main')
@section('title', 'Admins List')
@section('main-container')

<div class="container">
    <h2>Add Food Item</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
    @endif

    <form action="{{ route('fitem.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Food Item Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Upload Images (JPG/PNG)</label>
            <input type="file" name="images[]" class="form-control" multiple accept=".jpg,.png" required>
        </div>
        <button type="submit" class="btn btn-success">Add Item</button>
    </form>
</div>



@endsection
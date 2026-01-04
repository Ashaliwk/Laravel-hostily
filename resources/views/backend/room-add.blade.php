{{-- resources/views/backend/room-add.blade.php --}}
@extends('backend.layouts.main')
@section('title', 'Add Room Item')
@section('main-container')


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 font-weight-bold text-primary">Add New Room</h5>
            <a href="{{ url('/admin/room') }}">
                <button class="btn btn-success btn-sm">Room List</button>
            </a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('/admin/room-add') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input class="form-control @error('name') is-invalid @enderror"
                                   id="name" type="text" name="name"
                                   value="{{ old('name') }}" placeholder="Enter Room Name/Number" required>
                            <label for="name">Room Name / Number</label>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control @error('price') is-invalid @enderror"
                                   id="price" type="number" step="0.01" name="price"
                                   value="{{ old('price') }}" placeholder="Price" required>
                            <label for="price">Price per Night</label>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description"
                                      style="height: 120px">{{ old('description') }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">Room Image</label>
                            <input class="form-control @error('image') is-invalid @enderror"
                                   id="image" type="file" accept=".png,.jpg,.jpeg,.webp" name="image" required>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success btn-lg px-5">
                            Add Room
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
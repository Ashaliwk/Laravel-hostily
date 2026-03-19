@extends('backend.layouts.main')
@section('title', 'Add Team Member')
@section('main-container')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block p-4 border-left-success">
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <a href="{{ url('/admin/team') }}">
                <button class="btn btn-success">Team Member List</button>
            </a>
        </div>

        <div class="card-body">
            <form method="post" action="/admin/team-add" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <label>Full Name</label>
                    <input class="form-control" type="text" name="fullname" value="{{ old('fullname') }}">
                    @error('fullname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Designation -->
                <div class="form-floating mb-3">
                    <label>Designation</label>
                    <input class="form-control" type="text" name="designation" value="{{ old('designation') }}">
                    @error('designation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Intro (only ONE field now) -->
                <div class="form-floating mb-3">
                    <label>Introduction</label>
                    <textarea class="form-control" name="intro">{{ old('intro') }}</textarea>
                    @error('intro')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Instagram -->
                <div class="form-floating mb-3">
                    <label>Instagram</label>
                    <input class="form-control" type="text" name="insta" value="{{ old('insta') }}">
                    @error('insta')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-floating mb-3">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image" accept=".jpg,.jpeg,.png" style="padding-bottom:38px">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button class="btn btn-success">Add Member</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
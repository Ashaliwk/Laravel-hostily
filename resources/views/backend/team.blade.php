@extends('backend.layouts.main')
@section('title', 'Team Members List')
@section('main-container')
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"><a class="text-success" href="{{url('/admin')}}">Main Menu</a> | Team Members List</h6>
            <a href="{{url('/admin/team-add')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm float-right"><i
                    class="fas fa-plus fa-sm text-white-50"></i>Add New Member</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Designation</th>
                            <th>Profile</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th width="160px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->fullname }}</td>
                            <td>{{ $team->designation }}</td>
                            <td>{{ $team->intro }}</td>
                            <td>
                                <img src="{{ asset('uploads/team/'.$team->image) }}" width="60">
                            </td>
                            <td>Active</td>
                            <td>
                                <a href="/admin/team-delete/{{ $team->id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@extends('admin.home')
@section('admin-content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div>
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('unsuccess'))
                        <div class="alert alert-danger">{{ session('unsuccess') }}</div>
                    @endif
                    @if ($data[0]['avatar'])
                        <div class="col-6 my-3">
                            <img src="{{ asset('admin/uploads/profile_image/' . $data[0]['avatar']) }}" height="100px"
                                width="100px" alt="Profile_image">
                        </div>
                    @else
                        <div class="col-6 my-3">
                            <img src="" height="100px" width="100px" alt="Profile_image">
                        </div>
                    @endif
                    <form class="col-9 my-3" action="{{ route('profile.update_profile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name: </label>
                            <input type="text" name="name" id="name" class="form-control bg-transparent"
                                value="{{ $data[0]['name'] }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email: </label>
                            <input type="email" class="form-control" readonly value="{{ $data[0]['email'] }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Change Profile Picture: </label>
                            <input type="file" class="form-control bg-transparent" name="avatar">
                        </div>
                        <button class="btn btn-primary btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

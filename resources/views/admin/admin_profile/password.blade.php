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
                    <form class="col-9 my-3" action="{{ route('profile.update-password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_pass" class="form-label">Old Password: </label>
                            <input type="password" name="old_pass" id="old_pass" class="form-control bg-transparent">
                        </div>
                        <div class="form-group">
                            <label for="new_pass" class="form-label">New Password: </label>
                            <input type="password" name="new_pass" id="new_pass" class="form-control bg-transparent">
                        </div>
                        <div class="form-group">
                            <label for="confirm_pass" class="form-label">Confirm Password: </label>
                            <input type="password" name="confirm_pass" id="confirm_pass"
                                class="form-control bg-transparent">
                        </div>
                        <button class="btn btn-primary btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

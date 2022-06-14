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
                    <hr>
                    <h4>Change Password:</h4>

                    @if (session('success'))
                        <p class="alert alert-success">{{ session('success') }}</p>
                    @endif
                    @if (session('unsuccess'))
                        <p class="alert alert-danger">{{ session('unsuccess') }}</p>
                    @endif
                    <form class="col-9 my-3" action="{{ route('profile.update-password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_pass" class="form-label">Old Password: </label>
                            <input type="password" name="old_pass" id="old_pass" class="form-control bg-transparent">
                        </div>
                        @error('old_pass')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label for="new_pass" class="form-label">New Password: </label>
                            <input type="password" name="new_pass" id="new_pass" class="form-control bg-transparent"
                                value="{{ old('new_pass') }}">
                        </div>
                        @error('new_pass')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label for="confirm_pass" class="form-label">Confirm Password: </label>
                            <input type="password" name="confirm_pass" id="confirm_pass" value="{{ old('confirm_pass') }}"
                                class="form-control bg-transparent"><i
                                style="position: absolute; right: 20px; bottom: 19.5%; cursor: pointer;"
                                class="far fa-eye" id="togglePassword" onclick="hide_pass(this)"></i>
                        </div>
                        @error('confirm_pass')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-primary btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function hide_pass(x) {
            if (x.classList.contains('fa-eye')) {
                x.classList.remove('fa-eye');
                x.classList.add('fa-eye-slash');
                document.getElementById('confirm_pass').setAttribute('type', 'text');
            } else {
                x.classList.remove('fa-eye-slash');
                x.classList.add('fa-eye');
                document.getElementById('confirm_pass').setAttribute('type', 'password');
            }
        }
    </script>
@endsection

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
                        <li class="breadcrumb-item active">Edit Role</li>
                    </ol>
                </div>
                <div class="container">
                    <form action="{{ route('roles.addroles') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $details[0]->id }}">
                        <div class="col-9">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" placeholder="name" value="{{ $details[0]->name }}"
                                class="form-control">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn btn-info btn-sm m-2">Add Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

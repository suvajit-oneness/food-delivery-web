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
                        <li class="breadcrumb-item active">Edit Admin Users</li>
                    </ol>
                </div>
            </div>
            <form action="{{ route('admin.updateadmin') }}" method="POST">
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
                <div class="col-9">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="email" value="{{ $details[0]->email }}"
                        class="form-control">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="col-9">
                    <label for="type" class="form-label">Admin Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="">Select Admin type</option>
                        <option value="1" {{ $details[0]->type == 1 ? 'selected' : '' }}>Super Admin</option>
                        <option value="2" {{ $details[0]->type == 2 ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                @error('type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="col-9">
                    <h4 class="my-2">Select Roles for this admin</h4>
                    <div class="d-flex">
                        @foreach ($roles as $r)
                            <div class="mx-3">
                                <label for="role-{{ $r->id }}">{{ $r->name }}</label>
                                <input type="checkbox" name="roles[]" value="{{ $r->id }}"
                                    id="role-{{ $r->id }}" {{ in_array($r->id, $adroles) ? 'checked' : '' }}>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-info mx-2 my-3" type="submit">Edit Admin</button>
            </form>
        </div>
    </div>
@endsection

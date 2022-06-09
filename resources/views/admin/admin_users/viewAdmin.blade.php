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
                        <li class="breadcrumb-item active">View Admin</li>
                    </ol>
                </div>
                <div class="m-2">
                    <h4>{{ $details[0]->name }}</h4>
                    <h5>{{ $details[0]->email }}</h5>
                    <h5>{{ $details[0]->type == 1 ? 'Super Admin' : 'Admin' }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

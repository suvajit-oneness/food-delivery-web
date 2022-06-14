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
                        <li class="breadcrumb-item active">View all admins</li>
                    </ol>
                </div>
            </div>
            <a href="{{ route('admin.createadmin') }}" class="btn btn-primary my-3" style="float: right;">Add New Admin</a>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('unsuccess'))
                <div class="alert alert-danger">{{ session('unsuccess') }}</div>
            @endif
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin type</th>
                                <th>Roles</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $userKey => $user)
                                @php
                                    $rad = App\Models\Role_user::where('admin_id', $user->id)
                                        ->join('roles', 'roles.id', '=', 'role_users.role_id')
                                        ->get('name')
                                        ->toArray();
                                    
                                    $arr = [];
                                    foreach ($rad as $rad) {
                                        array_push($arr, $rad['name']);
                                    }
                                    $rads = implode(',', $arr);
                                @endphp
                                <tr>
                                    <td class="text-bold">{{ $userKey + 1 }}</a></td>
                                    <td>{{ $user->avatar }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <span class="badge badge-success">
                                            {{ $user->email }}
                                        </span>
                                    </td>
                                    <td>{{ $user->type == 1 ? 'Super Admin' : 'Admin' }}</td>
                                    <td>{{ $rads }}</td>
                                    <td>
                                        <a href="{{ route('admin.viewadmindetails', [$user->id]) }}"><i
                                                class="fa fa-eye btn btn-sm btn-primary" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin.editadmin', [$user->id]) }}"
                                            class="btn btn-sm btn-warning fa fa-pencil-alt"
                                            style="margin-left: -3px;">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.delete', [$user->id]) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

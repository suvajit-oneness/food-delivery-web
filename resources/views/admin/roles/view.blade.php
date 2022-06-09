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
                        <li class="breadcrumb-item active">View all Roles</li>
                    </ol>
                </div>
                <div>
                    <a href="{{ route('roles.createroles') }}" class="btn btn-info btn-sm m-2">Add new role</a>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('unsuccess'))
                        <div class="alert alert-danger">{{ session('unsuccess') }}</div>
                    @endif

                    <div class="col-12">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $dataKey => $data)
                                    <tr>
                                        <td class="text-bold">{{ $dataKey + 1 }}</a></td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href="{{ route('roles.editroles', [$data->id]) }}"
                                                class="btn btn-sm btn-warning fa" style="margin-left: -3px;">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('roles.delete', [$data->id]) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-sm btn-danger fa">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $datas->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

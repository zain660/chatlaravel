@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Deactive Users</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Display Picture</th>
                    <th scope="col">Email</th>
                    <th scope="col">Account Status</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @if ($all_active_users->count() > 0)
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($all_active_users as $item)
                        <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td><img src="{{ asset('/assets/media/avatar') }}/{{ $item->avatar }}" alt=""
                                    class="shadow p-3 mb-5 bg-white" style="width: 50px;border-radius: 100px;"></td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="badge badge-success">Active Account</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.deactive_user', $item->id) }}" class="btn btn-danger">DeActive
                                    Account</a>
                            </td>
                        </tr>
                    @endforeach
                    {{ $all_active_users->links() }}
                @else
                <tr>
                    <td>No data found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-0 text-gray-800">Packages</h1>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <a href="{{route('admin.create_package')}}" class="btn btn-primary">Create Package</a>
            </div>
        </div>
        <!-- Begin Page Content -->
        <br>
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Expiry</th>
                                    <th>Status</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                            </thead> 
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Expiry</th>
                                    <th>Status</th>
                                    <th>CreatedAt</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                             @if($all_packages->count() > 0)
                                @foreach($all_packages as $all_package)
                                <tr>
                                    <td>{{$all_package->pacakge_name}}</td>
                                    <td>{{$all_package->pacakge_description}}</td>
                                    <td>${{$all_package->pacakge_price}}</td>
                                    <td>{{$all_package->pacakge_valid}}</td>
                                    <td>
                                        @if($all_package->is_active == 0)   
                                            <div class="badge badge-danger">DeActive</div> 
                                        @else
                                            <div class="badge badge-success">Active</div> 
                                        @endif
                                    </td>
                                    <td>{{$all_package->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($all_package->is_active == 0)   
                                            <a href="{{route('admin.activate_package',$all_package->id)}}" class="btn btn-success">Activate</a> 
                                        @else
                                            <a href="{{route('admin.deactivate_package',$all_package->id)}}" class="btn btn-danger">DeActive</a> 
                                        @endif
                                        <a href="{{route('admin.edit_package',$all_package->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                               @else
                                No data found.
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

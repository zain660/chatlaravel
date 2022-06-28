@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-0 text-gray-800">Create Packages</h1>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <a href="{{ route('admin.all_packages') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
        <!-- Begin Page Content -->
        <br>

        <div class="card">
            <div class="card-header">
                Create Package
            </div>
            <div class="card-body">
                <form action="{{route('admin.add_package')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="package_name">Package Name</label>
                            <input type="text" required  name="package_name" id="package_name" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="pacakge_price">Package Price</label>
                            <input type="text" required name="pacakge_price" id="pacakge_price" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      
                        <div class="col-6">
                            <label for="pacakge_valid">Package Expire In</label>
                            <select name="pacakge_valid" required id="pacakge_valid" class="form-control">
                                <option value="1 day">1 Day</option>
                                <option value="1 month">1 Month</option>
                                <option value="2 month">2 Month</option>
                                <option value="6 month">6 Month</option>
                                <option value="life_time">Life Time</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="total_msg">Total Message</label>
                            <input type="number" required name="total_msg" id="total_msg" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <label for="pacakge_description">Package Description</label>
                            <textarea name="pacakge_description" required id="pacakge_description" class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary">Create Package</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

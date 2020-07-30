@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- put styling here -->
@stop
{{-- Page content --}}
@section('content')
    <!-- Content -->

    <div class="page-header">
        <h3>{{ $title }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-center gutters">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">

            <!-- Card start -->
            <div class="card m-0">
                <div class="card-header">
                    <div class="card-title">Customer Edit</div>
                    <ul class="text-muted custom">
                        <li>* Edit Customer.</li>
                    </ul>
                </div>
                <div class="card-body">

                    @include('notification.notifications')
                    <form class="needs-validation" method="POST" action="{{ route('customer.update', $customer->id) }}">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" name="firstName" value="{{ old('firstName', $customer->firstName) }}" id="firstName" placeholder="Enter firstname">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="middleName">Middle Name</label>
                                    <input type="text" class="form-control" name="middleName" value="{{ old('middleName', $customer->middleName) }}" id="middleName" placeholder="Enter middleName">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" value="{{ old('lastName', $customer->lastName) }}" name="lastName" placeholder="Enter lastName">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone NO</label>
                                    <input type="text" class="form-control" id="phone" value="{{ old('phone', $customer->phone) }}" name="phone" placeholder="Enter phone">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="nationalID">National NO</label>
                                    <input type="text" class="form-control" id="nationalID" value="{{ old('nationalID', $customer->nationalID) }}" name="nationalID" placeholder="Enter phone">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="company">Client Type</label>
                                    <select class="form-control selectpicker form-control" name="client">
                                        <option value="Private" @if($customer->client === "Private") selected="selected" @endif>Private</option>
                                        <option value="Company" @if($customer->client === "Company") selected="selected" @endif>Company</option>
                                        <option value="Other" @if($customer->client === "Other") selected="selected" @endif>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ old('email', $customer->email) }}"  name="email" id="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control" name="gender" >
                                        <option>Select Gender</option>
                                        <option value="Male" @if($customer->gender === "Male") selected="selected" @endif>Male</option>
                                        <option value="Female" @if($customer->gender === "Female") selected="selected" @endif>Female</option>
                                        <option value="Other" @if($customer->gender === "Other") selected="selected" @endif>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="gender">County</label>
                                    <select class="form-control" name="countyId" >
                                        <option>County</option>
                                        @foreach($counties as $county)
                                            <option value="{{ $county->id }}" {!! old('countyId', $customer->county->id) == $county->id ? 'selected="selected"' : '' !!}>{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address">{{ old('address', $customer->address) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-xl-12">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Card end -->

        </div>
    </div>
    <!-- ./ Content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- put scripts gera -->

@stop

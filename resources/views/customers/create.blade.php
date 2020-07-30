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
        <h3>Tenant</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tenant</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-center gutters">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissable margin5">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Success:</strong> {{ $message }}
                </div>
        @endif
            <!-- Card start -->
            <div class="card m-0">
                <div class="card-header">
                    <div class="card-title">Tenant Create</div>
                    <ul class="text-muted custom">
                        <li>* New Tenant.</li>
                    </ul>
                </div>
                <div class="card-body">

                    <form class="needs-validation" method="POST" action="{{ route('tenant.store') }}">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Name">
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-xl-12">
                                <button type="submit" id="submit" name="submit" class="btn btn-primary float-right">Submit Form</button>
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

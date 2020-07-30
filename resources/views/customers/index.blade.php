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

    <!-- Page header start -->
    <div class="page-header d-md-flex align-items-center justify-content-between">
        <div>
            <h3>{{ $title }}</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('customer.create') }}" class="btn btn-primary btn-uppercase">
                <i class="fa fa-plus m-r-5"></i> New Customer
            </a>
        </div>
    </div>
    <!-- Page header end -->

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <!-- Card start -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm custom-table m-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>nationalID</th>
                                <th>county</th>
                                <th>email</th>
                                <th>gender</th>
                                <th>client</th>
                                <th>address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($customers as $customer)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-capitalize">{{ $customer->firstName ?? '' }} {{ $customer->middleName ?? '' }} {{ $customer->lastName ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->nationalID ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->phone ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->county->name ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->email ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->gender ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->client ?? '' }}</td>
                                    <td class="text-capitalize">{{ $customer->address ?? '' }}</td>
                                    <td>
                                        <div class="td-actions">
                                            <a href="{{ route('customer.edit', $customer->id) }}" id="" class="icon green edit_button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <span class="icon-block m-r-5 bg-info icon-block-xs icon-block-floating">
                                                                    <i class="icon fa fa-edit"></i>
                                                                </span>
                                            </a>
                                            <a href="#" class="icon red toa" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <span class="icon-block m-r-5 bg-danger icon-block-xs icon-block-floating">
                                                                    <i class="icon fa fa-trash"></i>
                                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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

    <script type="text/javascript">
        $(function() {
            $(".toa").click(function(event){
                event.preventDefault();
                //Save the link in a variable called element
                var element = $(this);
                //Find the id of the link that was clicked
                var id = element.attr("id");
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you cannot recover!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type: "GET",
                                url: "/customer/delete/"+id,
                                data: id,
                                success:function (data) {
                                    swal({
                                        title: 'Deleted!',
                                        text: 'Customer deleted',
                                        type: 'success',
                                        icon: "success",
                                        showConfirmButton: true
                                    });

                                    element.parent().parent().fadeOut('slow', function() {$(this).remove();});
                                },
                                error:function (data) {
                                    swal({
                                        title: 'Failed',
                                        text: data.error,
                                        type: 'error',
//                      timer: 1000,
                                        confirmButtonText: 'Ok'
                                    });
                                }
                            });
                        }
                    });
            });
        });
    </script>
@stop

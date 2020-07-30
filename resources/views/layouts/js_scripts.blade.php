
<!-- begin::global scripts -->
<script src="{{ asset('assets/vendors/bundle.js') }}"></script>
<!-- end::global scripts -->

<!-- begin::chart -->
<script src="{{ asset('assets/vendors/charts/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/sparkline/sparkline.min.js') }}"></script>
<script src="{{ asset('assets/vendors/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/js/examples/charts.js') }}"></script>
<script src="{{ asset('') }}"></script>
<!-- end::chart -->

<script src="{{ asset('assets/vendors/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/examples/dashboard.js') }}"></script>

<!-- begin::vamp -->
<script src="{{ asset('assets/vendors/vmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/vmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('assets/js/examples/vmap.js') }}"></script>
<!-- end::vamp -->

<!-- begin::custom scripts -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/borderless.min.js') }}"></script>
<!-- end::custom scripts -->

<script type="text/javascript">
    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
    };
</script>
@yield('footer_scripts')

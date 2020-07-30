<!doctype html>
<html lang="en">
@include('layouts.head')
<body>

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading</span>
</div>
<!-- end::page loader -->

<!-- begin::sidebar -->
@include('layouts.sidebar')
<!-- end::sidebar -->

<!-- begin::side menu -->
@include('layouts.navigation')
<!-- end::side menu -->

<!-- begin::navbar -->
@include('layouts.navbar')
<!-- end::navbar -->

<!-- begin::main content -->
<main class="main-content">

    @yield('content')

</main>
<!-- end::main content -->
@include('layouts.js_scripts')
</body>

</html>

<!doctype html>
<html lang="en">
@include('layouts.head')
<body>

<!-- Loading starts -->
<div id="loading-wrapper">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Loading ends -->

<!-- *************
    ************ Header section start *************
************* -->

@include('layouts.header')

<!-- Screen overlay start -->
<div class="screen-overlay"></div>
<!-- Screen overlay end -->

<!-- Quick settings start -->
@include('layouts.quicksetting')
<!-- Quick settings end -->

<!-- *************
    ************ Header section end *************
************* -->

<!-- Container fluid start -->
<div class="container-fluid">

    <!-- Navigation start -->
@include('layouts.navigation')
<!-- Navigation end -->

    <!-- *************
        ************ Main container start *************
    ************* -->
    <div class="main-container">

        @yield('content')

    </div>
    <!-- *************
        ************ Main container end *************
    ************* -->

    <!-- Footer start -->
@include('layouts.footer')
<!-- Footer end -->

</div>
<!-- Container fluid end -->

@include('layouts.js_scripts')
</body>

<!-- Mirrored from bootstrap.gallery/bluemoon-v6/main_files/dashboards/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jun 2020 14:31:48 GMT -->
</html>

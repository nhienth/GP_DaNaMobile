<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('admin.layouts.head')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->

    @include('admin.layouts.header')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    @include('admin.layouts.sidebar')
    
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

    @yield('main')

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    
    @include('admin.layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>

    <script src="{{asset('backend/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('backend/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    
    <script src="{{asset('backend/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/scripts/forms/form-file-uploader.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
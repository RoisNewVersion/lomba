 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('js/jquery-1.12.2.js') !!}"></script>

    <!-- Bootstrap JavaScript -->
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

    <!-- Custom JavaScript -->
    <script src="{!! asset('js/custom.js') !!}"></script>
    <!-- sweetalert -->
    <script src="{!! asset('js/sweetalert.min.js') !!}"></script>
    <!-- datatable -->
    <script src="{!! asset('js/datatables.min.js') !!}"></script>
    <script src="{!! asset('js/dataTables.responsive.min.js') !!}"></script>
    <!-- nprogress -->
    <script src="{!! asset('js/nprogress.js') !!}"></script>

    <!-- Call functions on document ready -->
    <script>
        $(document).ready(function() {
            // Call Menu Toggler
            appMaster.menuToggler();
            // Example Call anotherFunction
            appMaster.anotherFunction();
            // Nprogress
            NProgress.configure({ showSpinner: false });
            NProgress.start();
            NProgress.done();
        });
    </script>   

    @yield('js')

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
</body>

</html>

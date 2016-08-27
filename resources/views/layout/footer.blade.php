 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.2.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

    <!-- Custom JavaScript -->
    <script src="{!! asset('js/custom.js') !!}"></script>

    <!-- Call functions on document ready -->
    <script>
        $(document).ready(function() {
            // Call Menu Toggler
            appMaster.menuToggler();
            // Example Call anotherFunction
            appMaster.anotherFunction();
        });
    </script>

</body>

</html>

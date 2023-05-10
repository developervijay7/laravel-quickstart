@if(session()->get('toast_success'))
    <script>
        toastr.success("{{ session()->get('toast_success') }}", "Success");
    </script>
@endif

@if(session()->get('toast_warning'))
    <script>
        toastr.warning("{{ session()->get('toast_warning') }}", "Warning");
    </script>
@endif

@if(session()->get('toast_info') || session()->get('toast_message'))
    <script>
        toastr.info("{{ session()->get('toast_info') }}", "Info");
    </script>
@endif

@if(session()->get('toast_error'))
    <script>
        toastr.error("{{ session()->get('toast_error') }}", "Error");
    </script>
@endif

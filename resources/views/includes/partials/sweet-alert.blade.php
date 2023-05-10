@if(session()->get('sweet_success'))
    <script>
        Swal.fire("Success", "{!! session()->get('sweet_success') !!}", "success");
    </script>
@endif

@if(session()->get('sweet_warning'))
    <script>
        Swal.fire("Warning", "{!! session()->get('sweet_warning') !!}", "warning");
    </script>
@endif

@if(session()->get('sweet_info') || session()->get('sweet_message'))
    <script>
        Swal.fire("Info", "{!! session()->get('sweet_info') !!}", "info");
    </script>
@endif

@if(session()->get('sweet_error'))
    <script>
        Swal.fire("Error", "{!! session()->get('sweet_error') !!}", "error");
    </script>
@endif

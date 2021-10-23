@if(\Session::has('success'))
    <script>
        // Display an info toast with no title
        toastr.success('{{Session::get('success')}}');

    </script>
@endif

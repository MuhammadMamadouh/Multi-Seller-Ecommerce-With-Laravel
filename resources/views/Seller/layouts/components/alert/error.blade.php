@if(Session::has('error'))
    <script> toastr.error('{{Session::get('error')}}'); </script>
@endif

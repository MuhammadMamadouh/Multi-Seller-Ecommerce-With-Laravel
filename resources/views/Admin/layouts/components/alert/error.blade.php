@if(Session::has('error'))
    <script>
        toastr.error('{{Session::get('error')}}');
    </script>
@endif
@if(Session::has('errors'))
    @foreach(session('errors')->all() as  $msg)
        <script>
            toastr.error('{{$msg}}');
        </script>
    @endforeach
@endif

@extends('Admin.layouts.master')
@section('title', $title)
@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jsgrid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-toggle.min.css')}}">
@endsection
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <a href="{{route('products.create')}}" class="btn btn-outline-info">{{__('general.new_record')}}</a>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="batchDelete" class="category-table order-table jsgrid"
                             style="position: relative; height: auto; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        @foreach($attributes as $attr)
                                            <th class="jsgrid-header-cell"> {{__('validation.attributes.' . $attr)}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- Datatables js-->
    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>


    <script>
        var dataTable = $('#basic-1').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: true,
            pageLength: 10,
            "order": [[0, "desc"]],
            ajax: '{{ route('products.index') }}',
            columns: [

                {data: 'id',            name: 'DT_RowIndex'},
                @foreach($attributes as $attr)

                {data: '{{$attr}}',          name: '{{$attr}}', width: '20%'},
                    @endforeach

            ]
        });

        $('body').on('change', 'input[name=status]', function (e) {

            let mode = $(this).prop('checked');
            console.log(mode)
            let id = $(this).val();
            $.ajax({
                url: "{{route('products.status')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id
                },
                success: function (e) {
                    if (e.status == true) {
                        sweetAlert.fire({
                            icon: 'success',
                            title: e.msg,
                            confirmButtonText: "{{__('messages.ok')}}",
                        })

                    } else {
                        sweetAlert.fire({
                            title: e.msg,
                            icon: 'error',
                            confirmButtonText: "{{__('messages.ok')}}",

                        })
                    }
                }
            })
        });

        $('body').on('click', '.delbtn', function (e) {

            let form = $(this).closest('form');
            e.preventDefault();
            let id = $(this).data('id');
            let url = form.attr('action');

            swal.fire({
                title: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText : '{{__('messages.cancel')}}',
                confirmButtonText: '{{__('messages.yes')}}',
            }).then(result => {
                if (result.isConfirmed)
                    form.submit();

            });
        });

    </script>
@endsection

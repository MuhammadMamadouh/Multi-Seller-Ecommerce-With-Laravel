@extends('Admin.layouts.master')
@section('title', $title)
@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jsgrid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-toggle.min.css')}}">
@endsection
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">

        <a href="{{$createLink}}" class="btn btn-outline-info">{{__('general.new_record')}}</a>
        @if(Route::has($route . '.multi_delete'))
            <form action="{{route($route . '.multi_delete')}}" method="post" id="delete_all" style="display: inline">
                @csrf  @method("delete")
                <input type="submit" value="{{__('btns.delete all')}}" class="btn btn-outline-danger" disabled
                       id="delete_all_btn">
                @endif
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
            </form>
    </div>
@endsection
@section('extra-js')

    <!-- Datatables js-->
    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>


    <script>
        table = $('#basic-1').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 25,
            "order": [[0, "desc"]],
            ajax: '{{ \Illuminate\Support\Facades\Request::fullUrl() }}',
            columns: [
                {data: 'id', name: 'DT_RowIndex'},
                    @if(Route::has($route . '.multi_delete'))
                {
                    data: 'checkbox', name: 'checkbox',
                    title: '<input type="checkbox" id="check_all" name="items[]" onclick="checkAll()">',
                    orderable: false, serachable: false, sClass: 'text-center'
                },
                    @endif
                    @foreach($attributes as $column)
                {
                    data: '{{$column}}',
                    name: '{{$column}}',
                    title: '{{__('validation.attributes.' . $column)}}',
                    width: '15%'
                },
                @endforeach
            ]
        });

        @if(Route::has($route . '.status'))
        $('body').on('change', 'input[name=status]', function (e) {

            let mode = $(this).prop('checked');

            let id = $(this).val();
            $.ajax({
                url: "{{$statusLink}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id
                },
                success: function (e) {
                    if (e.status == true) {
                        toastr.success('{{ __('messages.updated_successfully')}}')

                    } else {
                        toastr.error('{{__('messages.something_wrong')}}')

                    }
                }
            })
        });
        @endif
        @if(Route::has($route . '.multi_delete'))
        $('body').on('submit', '#delete_all', function (e) {

            let form = $(this).closest('form');
            let action = form.attr('action');
            e.preventDefault();
            swal.fire({
                title: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: '{{__('messages.cancel')}}',
                confirmButtonText: '{{__('messages.yes')}}',
                toast: false
            }).then(result => {
                if (result.isConfirmed)
                    $.ajax({
                        url: action,
                        type: 'DELETE',
                        data: form.serialize(),
                        success: function (data) {

                            Swal.fire(
                                '{{__('messages.deleted_successfully!')}}',
                                data,
                                'success'
                            )
                            $('#basic-1').DataTable().ajax.reload();
                        }
                    });
            });
        });
        @endif
        $('body').on('click', '.delbtn', function (e) {
            e.preventDefault();
            let form = $(this).closest('form');
            let action = form.attr('action');
            Swal.fire({
                title: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('messages.yes')}}',
                cancelButtonText: '{{__('messages.cancel')}}',
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: 'DELETE',
                        data:
                            {_token: '{{csrf_token()}}'},
                        success: function (data) {

                            Swal.fire(
                                '{{__('messages.deleted!')}}',
                                data,
                                'success'
                            )
                            $('#basic-1').DataTable().ajax.reload();
                        }
                    });

                }
            })
        });

        function checkAll() {
            $('input[class="itm_chkbx"]:checkbox').each(function () {
                if ($('input[id="check_all"]:checkbox:checked').length == 0) {
                    $(this).prop('checked', false)
                } else {
                    $(this).prop('checked', true)
                }
            })
        }

        $('body').on('change', '.itm_chkbx', function (e) {
            if ($('input[class="itm_chkbx"]:checkbox:checked').length == 0) {
                $('#delete_all_btn').attr('disabled', true)
            } else {
                $('#delete_all_btn').attr('disabled', false)
            }
        })
    </script>
@endsection

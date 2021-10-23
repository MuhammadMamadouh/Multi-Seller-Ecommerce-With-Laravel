@extends('Admin.layouts.master')
@section('title', $title)
@section('extra-css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jsgrid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-toggle.min.css')}}">
@endsection
@section('content')

    <div class="container-fluid">
        <a href="{{route('vendors.create')}}" class="btn btn-outline-info">{{__('general.new_record')}}</a>
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
                            {{--                            <div class="jsgrid-grid-body">--}}
                            {{--                                <table class="jsgrid-table">--}}
                            {{--                                    <tbody>--}}
                            {{--                                    @foreach($items as $item)--}}
                            {{--                                        <tr class="jsgrid-row">--}}
                            {{--                                            <td class="jsgrid-cell jsgrid-align-center">{{$loop->iteration}}</td>--}}
                            {{--                                            --}}{{--                                            <td class="jsgrid-cell jsgrid-align-center"><input--}}
                            {{--                                            --}}{{--                                                    type="checkbox"></td>--}}

                            {{--                                            <td class="jsgrid-cell">{{$item->name}}</td>--}}
                            {{--                                            <td class="jsgrid-cell">{{$item->email}}</td>--}}
                            {{--                                            <td class="jsgrid-cell">{{$item->mobile}}</td>--}}
                            {{--                                            <td class="jsgrid-cell">{{$item->address}}</td>--}}
                            {{--<td class="jsgrid-cell">{{$item->logo}}</td>--}}
                            {{--                                            <td class="jsgrid-cell jsgrid-align-right ">--}}
                            {{--                                                <input type="checkbox" name="status" id="statusBtn"--}}
                            {{--                                                       value="{{$item->id}}"--}}
                            {{--                                                    {{$item->status == 'active' ? 'checked' : ''}}--}}
                            {{--                                                >--}}
                            {{--                                            </td>--}}

                            {{--                                            <td class="jsgrid-cell">{{$item->category->getTranslation()->pivot->name}}</td>--}}
                            {{--                                            <td class="jsgrid-cell jsgrid-align-right">--}}
                            {{--                                                <a href="{{route('vendors.edit', $item->id)}}"--}}
                            {{--                                                   class="btn btn-primary"><i class="fa fa-edit"></i></a>--}}
                            {{--                                            </td>--}}
                            {{--                                            <td class="jsgrid-cell jsgrid-align-right">--}}
                            {{--                                                <form action="{{route('vendors.destroy', $item->id)}}" method="post">--}}
                            {{--                                                    @csrf--}}
                            {{--                                                    @method('delete')--}}
                            {{--                                                    <a href="" title="delete" data-id="{{$item->id}}"--}}
                            {{--                                                       class="delbtn btn btn-danger"><i class="fa fa-trash"></i></a>--}}
                            {{--                                                </form>--}}
                            {{--                                            </td>--}}
                            {{--                                        </tr>--}}
                            {{--                                    @endforeach--}}
                            {{--                                    </tbody>--}}
                            {{--                                </table>--}}
                            {{--                            </div>--}}
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
            autoWidth: false,
            pageLength: 5,
            // scrollX: true,
            "order": [[0, "desc"]],
            ajax: '{{ route('vendors.index') }}',
            columns: [
                {data: 'id', name: 'DT_RowIndex', title: '#' , orderable: false, serachable: false, sClass: 'text-center'},
                {data: 'checkbox', name: 'checkbox', title: '<input type="checkbox" id="check_all" name="items[]" onclick="checkAll()">' , orderable: false, serachable: false, sClass: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'mobile', name: 'mobile'},
                {data: 'address', name: 'address'},
                {data: 'status', name: 'status'},
                {data: 'photo', name: 'photo'},
                {data: 'main_category', name: 'main_category'},
                {data: 'Actions', name: 'Actions', orderable: false, serachable: false, sClass: 'text-center'},
            ]
        });

        $('input[name=status]').change(function (e) {
            let mode = $(this).prop('checked');
            let id = $(this).val();
            $.ajax({
                url: "{{route('main_categories.status')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id
                },
                success: function (e) {
                    if (e.status == true) {
                        sweetAlert.fire({
                            title: 'تمت',
                            icon: 'success',
                            text: 'تمت العملية بنجاح'
                        })
                    } else {
                        sweetAlert.fire({
                            title: 'تمت',
                            icon: 'error',
                            text: 'حدث خطأ ما'
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
                text: '{{__('messages.are_you_sure')}}',
                icon: 'warning',
                sowCancelButton: true,
                confirmButtonText: 'نعم',
                toast: true
            }).then(result => {
                if (result.isConfirmed) {
                    form.submit();
                    sweetAlert.fire(
                        'DELETED!',
                        'A record has been deleted',
                        'success'
                    )
                }
            });

        });
        function checkAll(){
            $('input[class="itm_chkbx"]:checkbox').each(function (){
                if ($('input[id="check_all"]:checkbox:checked').length == 0){
                    $(this).prop('checked', false)
                }else{
                    $(this).prop('checked', true)
                }
            })
        }

    </script>
@endsection

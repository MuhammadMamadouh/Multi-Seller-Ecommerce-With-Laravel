@extends('layouts.register_layout')
@section('content')
    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">

        <!-- ======== Normal User ===== -->
        <li class="nav-item">
            <a class="nav-link " href="{{url('/register')}}"><span class="icon-user me-2"></span>{{__('titles.customer')}}</a>
        </li>

        <!-- ======== Seller User ===== -->
        <li class="nav-item">
            <a class="nav-link active"  href="{{route('seller.register')}}"><span
                    class="icon-unlock me-2"></span>{{__('titles.seller')}}</a>
        </li>
    </ul>
    <div class="tab-content" id="top-tabContent">


        <!-- ================================= Seller ======================================== -->
        <div class="tab-pane fade  show active" id="top-contact" role="tabpanel"
             aria-labelledby="contact-top-tab">
            <form class="form-horizontal auth-form" method="post"
                  action="{{route('seller.register')}}" enctype="multipart/form-data">
                @csrf
                <div class="tab-pane fade show active" id="top-contact" role="tabpanel"
                     aria-labelledby="contact-top-tab">

                    <div class="row">
                        @foreach($writables as $attr => $key)
                            @if(in_array($key['type'], generalInputs()))
                                <div class="form-group col-md-6 row m-r-10">
                                    <label>{{__('validation.attributes.' .$attr)}}</label>
                                    <input type="{{$key['type']}}" name="{{$attr}}"
                                           placeholder="{{__('validation.attributes.' .$attr)}}"
                                           class="form-control col-md-5">
                                </div>
                                @if ($errors->has($attr))
                                    <span class="text-danger">{{ $errors->first($attr) }}</span>
                                @endif
                            @elseif($key['type'] === 'selection')
                                <div class="form-group col-md-6 row m-r-10">
                                    <label>{{__('validation.attributes.' .$attr)}}</label>
                                    <select class="custom-select form-control basic-multiple"
                                            id="{{$attr}}" name="{{$attr}}"
                                    <option value=""></option>
                                    @foreach($key['values'] as $values => $val)
                                        <option
                                            value="{{$val['value']}}" {{isset($item) && $item->$attr == $val['value'] ? 'selected' : ''}}>
                                            {{$val['text']}}
                                        </option>
                                        @endforeach
                                        </select>
                                </div>
                                @if ($errors->has($attr))
                                    <span class="text-danger">{{ $errors->first($attr) }}</span>
                                @endif

                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="form-button">
                    <button class="btn btn-primary"
                            type="submit">{{__('btns.register as customer')}}</button>

                </div>
                <div class="form-footer">
                    <span>Or Login up with social platforms</span>
                    <ul class="social">
                        <li><a class="icon-facebook" href=""></a></li>
                        <li><a class="icon-twitter" href=""></a></li>
                        <li><a class="icon-instagram" href=""></a></li>
                        <li><a class="icon-pinterest" href=""></a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection

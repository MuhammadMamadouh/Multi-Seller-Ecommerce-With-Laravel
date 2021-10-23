@extends('Admin.layouts.master')
@section('title', $title)
@section('small-title', $smallTitle)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-body">
                        <form class="needs-validation user-add" enctype="multipart/form-data"
                              action="{{isset($item) ? route('sub_categories.update',[$mainCategory->id, $item->id]) : route('sub_categories.store', $mainCategory)}}"
                              method="post">
                        @if(isset($item)) @method('patch') @endif
                        @csrf

                        @foreach($writables as $attr => $key)
                            @php($type = $key['type'])
                            @if(in_array($type, generalInputs()))
                                @if(getLanguages()->count() > 0 && in_array($attr, $translables)) <!-- Start If language -->
                                    @foreach(getLanguages() as $index => $lang )

                                        @isset($item)
                                            <x-general-input :attr="$attr" :type="$type" :lang="$lang" :index="$index"
                                                             :item="$item" :key="$key"></x-general-input>
                                        @else
                                            <x-general-input :attr="$attr" :type="$type" :lang="$lang" :index="$index"
                                                             :key="$key"></x-general-input>
                                        @endisset
                                    @endforeach
                                    @else  <!-- else if language -->

                                    @isset($item) <!-- check if it's edit page -->
                                    <x-general-input :attr="$attr" :type="$type" :item="$item"
                                                     :key="$key"></x-general-input>
                                    @else       <!-- it's create page-->
                                    <x-general-input :attr="$attr" :type="$type"
                                                     :key="$key"></x-general-input>
                                    @endisset
                                    @endif          <!-- endif get Languages-->

                                    <!--============================================
                                        ------------- Textarea Input-------------------
                                        ============================================ -->
                                @elseif($type === 'textarea')
                                    @if(getLanguages()->count() > 0 && in_array($attr, $translables))
                                        @foreach(getLanguages() as $index => $lang )
                                            @isset($item) <!-- check if it's edit page -->
                                            <x-text-area-input :item="$item" :attr="$attr" :lang="$lang"
                                                               :index="$index"></x-text-area-input>
                                            @else       <!-- it's create page-->
                                            <x-text-area-input :attr="$attr" :lang="$lang"
                                                               :index="$index"></x-text-area-input>
                                            @endisset
                                        @endforeach  <!--end getLanguage Foreach -->
                                    @else                 <!--else getLanguage Foreach -->
                                    @isset($item) <!-- check if it's edit page -->
                                    <x-text-area-input :item="$item" :attr="$attr"></x-text-area-input>
                                    @else       <!-- it's create page-->
                                    <x-text-area-input :attr="$attr"></x-text-area-input>
                                    @endisset
                                    @endif


                                @elseif($type === 'selection')
                                    @isset($item) <!-- check if it's edit page -->
                                    <x-select :item="$item" :attr="$attr" :key="$key"></x-select>
                                    @else       <!-- it's create page-->
                                    <x-select :attr="$attr" :key="$key"></x-select>
                                    @endisset
                                @endif
                            @endforeach

                            @isset($relationships)
                                @foreach($relationships as $relationship)
                                    <div class="form-group row" id="parent_cats">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="parent">{{__('validation.attributes.parent')}}</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="custom-select form-control"
                                                    name="parent_id">
                                                <option value=""></option>
                                                @foreach($relationship as $rel)
                                                    <option
                                                        value="{{$rel->id}}" {{isset($item) && $item->parent_id === $rel->id ? 'selected' : ''}}>
                                                        {{$rel->getTranslation()->pivot->name}}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has($attr))
                                                <span class="text-danger">{{ $errors->first($attr) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endisset



                            <div class="pull-right">
                                <input type="submit" value="{{__('btns.save')}}" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extra-js')


@endsection

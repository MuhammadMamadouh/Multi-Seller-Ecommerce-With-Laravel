<div class="form-group row">
    <div class="col-xl-3 col-md-4">
        <label for="{{$attr}}">{{__('validation.attributes.' . $attr)}}</label>

    </div>
    <div class="col-xl-8 col-md-7">
        <select class="custom-select form-control basic-multiple" id="{{$attr}}" name="{{$attr}}"
        @isset($key['multiple']) multiple @endisset>
            <option value=""></option>
            @foreach($key['values'] as $values => $val)
                <option
                    value="{{$val['value']}}" {{isset($item) && $item->$attr == $val['value'] ? 'selected' : ''}}>
                    {{$val['text']}}
                </option>
            @endforeach
        </select>
        @if ($errors->has($attr))
            <span class="text-danger">{{ $errors->first($attr) }}</span>
        @endif
    </div>
</div>

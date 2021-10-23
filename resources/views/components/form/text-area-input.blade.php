<div class="form-group row">
    <div class="col-xl-3 col-md-4">
        <label for="{{$attr}}">{{__('validation.attributes.' .$attr)}}
            @if($lang)- {{__('messages.' .$lang->abbr)}}@endif
        </label>
    </div>
    <div class="col-xl-8 col-md-7">
                <textarea class="form-control editor" id="{{$attr}}"
                          name="{{isset($lang) ? "translation[$index][$attr]" : "$attr"}}"
                >@if($lang){{isset($item) ? $item->transToLanguage(language:$lang->abbr, attribute:$attr) : ''}}@else{{isset($item) ? $item->$attr : ''}}@endif</textarea>
        @if ($errors->has($attr))
            <span class="text-danger">{{ $errors->first($attr) }}</span>
        @endif
    </div>
</div>

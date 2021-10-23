<div class="form-group row">
    <div class="col-xl-3 col-md-4">
        <label for="{{$attr}}">{{__('validation.attributes.' .$attr)}}
            @if($lang)
                - {{__('messages.' .$lang->abbr)}}
            @endif
        </label>
    </div>
    <div class="col-xl-8 col-md-7">

        <input class="form-control" id="{{$attr}}" type="{{$type}}"
               name="{{isset($lang) ? "translation[$index][$attr]" : "$attr"}}"

               @if($lang)
               value="{{isset($item) ? $item->transToLanguage(language:$lang->abbr, attribute:$attr) : ''}}"
               @else
               value="{{isset($item) ? $item->$attr : ''}}"
            @endif
                {{isset($key) && $type == 'file' && $key['multiple'] ? 'multiple' :''}}
        >

        @if($type == 'file')
            <div class="card-body bordered border-4" id="gallery">
                <img  id="view-image" class="img-thumbnail" src="{{isset($item) ? asset('storage/') .'/'.$item->$attr : ''}}">
            </div>
        @endif
        @if ($errors->has($attr))
            <span class="text-danger">{{ $errors->first($attr) }}</span>
        @endif
    </div>
</div>

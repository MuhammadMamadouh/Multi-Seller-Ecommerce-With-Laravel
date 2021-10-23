<input type="checkbox" class="status" {{$status == 'active' ? 'checked' : ''}} name="status" id="statusBtn"  value="{{$id}}" data-id="{{$id}}">
<p>{{ __('validation.attributes.active')}}</p>

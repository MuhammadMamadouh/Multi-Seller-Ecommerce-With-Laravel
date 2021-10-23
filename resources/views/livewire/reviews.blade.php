<div>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-secondary">
                {{session('message')}}
            </div>
        @endif
        <div class="row g-3">
            <div class="col-md-12">
                <div class="media">
                    <label>Rating</label>
                    <form wire:submit.prevent="addReview">
                    <div class="media-body ms-3">
                        <select name="rate" wire:model="rate">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>
            <form wire:submit.prevent="addReview">
                <div class="col-md-12">
                    <label><h5>{{__('validation.attributes.title')}}</h5></label>
                    <input type="text" class="form-control" required=""
                           wire:model.lazy="title">
                    @error('title') <span class="error-message">{{$message}}</span> @enderror
                </div>

                <div class="col-md-12 mt-6">
                    <label><h5>{{__('validation.attributes.comment')}}</h5></label>
                    <textarea class="form-control" rows="6" wire:model.lazy="body"></textarea>
                    @error('body') <span class="error-message">{{$message}}</span> @enderror
                </div>
                <div class="col-md-12">
                    <button class="btn btn-normal" type="submit">{{__('btns.submit_review')}}</button>
                </div>
            </form>
        </div>
    </div>
    {{--    @isset($reviews)--}}
    @forelse($reviews as $review)
        <div class="rounded border shadow p-2 my-2">
            <div class="row">
                <div class="col-1">
                    <img src="{{asset('storage/' . $review->user->photo)}}" class="image-clean img-thumbnail"
                         style="width: 60px;">
                    <p>{{$review->user->name}}</p>
                </div>
                <div class="col-10">
                    <div class="justify-content-start border-9 rounded-contain my-2">
                        <h4>{{$review->title}}</h4>
                        <ul id="u-rating-fontawesome-o">
                            @for($i=0; $i< $review->rate; $i++)
                            <li><i class="fa fa-star"></i></li>
                            @endfor
                        </ul>
                        <button class="btn btn-air-danger pull-right" wire:click="remove({{$review->id}})"
                        >x</button>
                        <p class="front-bold text-lg">
                            {{$review->body}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger mt-5 text-center">
        <h4>{{strtoupper(__('messages.no_reviews'))}}</h4>

        </div>
    @endforelse
{{--    {{$reviews->links('vendor.pagination.bootstrap-4')}}--}}
    {{--    @endisset--}}
</div>

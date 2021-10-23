<div class="tab-pane fade" id="images" role="tabpanel"
     aria-labelledby="top-profile-tab">
    <div class="card">
        <div class="add-product ">
            <div class="row">
                <div class="col-xl-6 xl-50 col-sm-6 col-9">
                    <img
                        src="{{isset($item) && $item->images ? asset('storage/' . json_decode($item->images) [0]) :asset('images/product-sidebar/001.jpg')}}"
                        alt="" id="main_img"
                        class="img-fluid image_zoom_1 blur-up lazyloaded">
                </div>

                <div class="col-xl-3 xl-50 col-sm-6 col-3">
                    <ul class="file-upload-product">

                        @for($i=0; $i< 4; $i++)
                            @php($src = isset($item) && $item->images && $i < count(json_decode($item->images))  ? asset('storage/' . json_decode($item->images) [$i])
                                                : asset('images/product-sidebar/001.jpg'))
                            <li>
                                <div class="box-input-file"
                                     style="height: auto; width: 100px">
                                    <img
                                        src="{{$src}}"
                                        class="img-thumbnail" id="image-{{$i}}">
                                    <i class="fa fa-close"
                                       onclick="deletePhoto('image-{{$i}}')"
                                       style="{{isset($item) ? 'display: block' : 'display: none'}}; position: absolute; top: 0; right: 0; font-size: 20px;">
                                    </i> <input class="upload" name="images[]"
                                                type="file" value="{{$src}}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </li>
                        @endfor

                    </ul>
                </div>
            </div>
        </div>
        @if ($errors->has('images.0'))
            <span class="text-danger">{{ $errors->first('images.0') }}</span>
        @endif
    </div>
</div>

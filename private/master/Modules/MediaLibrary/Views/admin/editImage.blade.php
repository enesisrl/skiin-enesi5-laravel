<ul class="nav nav-tabs" id="myTab1" role="tablist">
    @foreach($conversions as $index=>$conversion)
        <li class="nav-item">
            <a class="nav-link {!! ($index == 0) ? 'active' : '' !!}" id="image-edit-tab-{!! $index !!}" data-toggle="tab" href="#image-{!! $index !!}">
                <span class="nav-text">{!! __('admin::label.thumb_number',['number'=>($index+1)]) !!}</span>
            </a>
        </li>
    @endforeach
</ul>

<div class="tab-content mt-5" id="myTabContent">
    @foreach($conversions as $index=>$conversion)
        <div class="tab-pane fade show {!! ($index == 0) ? 'active' : '' !!}" id="image-{!! $index !!}" role="tabpanel" aria-labelledby="image-edit-tab-{!! $index !!}">
            <div class="conversion-info" id="conversion-info-{!! $index !!}">
                <div class="row">
                    @php
                        $info = \Illuminate\Support\Arr::get($conversion->getManipulations()->toArray(),0);
                    @endphp
                    <div class="col-md-8">
                        <div class="mb-3">
                            <div class="thumb-viewer" id="thumb-viewer-{!! $index !!}" style="background-image: url('{!! $media->getUrl($conversion->getName()) !!}')">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex flex-column flex-grow-1 mb-4">
                            <p class="font-weight-bold mb-0">{!! __("admin::label.filename") !!}</p>
                            <span class="text-dark">{!! $media->file_name !!}</span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mb-4">
                            <p class="font-weight-bold mb-0">{!! __("admin::label.dimensione_file") !!}</p>
                            <span class="text-dark">{!! \Spatie\MediaLibrary\Support\File::getHumanReadableSize($media->size) !!}</span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mb-4">
                            <p class="font-weight-bold mb-0">{!! __("admin::label.formato") !!}</p>
                            <span class="text-dark">{!! $media->getCustomProperty('width')."x".$media->getCustomProperty('height') !!}</span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mb-4">
                            <p class="font-weight-bold mb-0">{!! __("admin::label.dimensione_miniatura") !!}</p>
                            <span class="text-dark">{!! \Spatie\MediaLibrary\Support\File::getHumanReadableSize(\Master\Facades\Tool::getFileSize($media->getPath($conversion->getName()))) !!}</span>
                        </div>
                        <div class="d-flex flex-column flex-grow-1 mb-4">
                            <p class="font-weight-bold mb-0">{!! __("admin::label.formato_miniatura") !!}</p>
                            <span class="text-dark">{!! $info['width']."x".$info['height'] !!}</span>
                        </div>
                        @if(\Illuminate\Support\Arr::get($info,'fit') == 'crop')
                            <div class="d-flex flex-column flex-grow-1 mb-4">
                                <button onclick="cropper('{!! $index !!}')" class="btn btn-info">{!! __('admin::label.crop') !!}</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(\Illuminate\Support\Arr::get($info,'fit') == 'crop')
                <div class="conversion-crop" id="conversion-crop-{!! $index !!}" style="display: none">
                    @php
                        $img_file = \Spatie\MediaLibrary\Support\ImageFactory::load($media->getPath());
                        //$thumb_file = \Spatie\MediaLibrary\Support\ImageFactory::load($media->getUrl($conversion->getName()));
                        $img_width = $currentWidth = $img_file->getWidth();
                        $img_height = $currentHeight = $img_file->getHeight();
                        if ($img_height > 480){
                            $img_height = 480;
                            $img_width = $currentWidth * 480 / $currentHeight;
                        }
                        $multiplier = $currentHeight / $img_height;
                    @endphp
                    <input type="hidden" name="media_id_{!! $index !!}" value="{!! $media->uuid !!}">
                    <input type="hidden" name="conversion_name_{!! $index !!}" value="{!! $conversion->getName() !!}">
                    <input type="hidden" name="conversion_width_{!! $index !!}" value="{!! $info['width'] !!}">
                    <input type="hidden" name="conversion_height_{!! $index !!}" value="{!! $info['height'] !!}">
                    <input type="hidden" class="multiplier" value="{!! $multiplier !!}">
                    <input type="hidden" class="dataX" name="dataX_{!! $index !!}" value="">
                    <input type="hidden" class="dataY" name="dataY_{!! $index !!}" value="">
                    <input type="hidden" class="dataWidth" name="dataWidth_{!! $index !!}" value="">
                    <input type="hidden" class="dataHeight" name="dataHeight_{!! $index !!}" value="">
                    <input type="hidden" class="dataRotate" name="dataRotate_{!! $index !!}" value="">
                    <div class="row">
                        <div class="col-10 col-md-9 col-lg-10">
                            <div class="mt-3 cropper-image-container">
                                <div class="cropper-image">
                                    <img data-crop-width="{!! $info['width'] !!}" data-crop-height="{!! $info['height'] !!}" id="image-to-crop-{!! $index !!}" src="{!! $media->getUrl() !!}" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-2 col-md-3 col-lg-2">
                            <div id="cropper-buttons" class="cropper-buttons mt-5">
                                @php
                                    /*
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                                            <i class="fa fa-search-plus"></i> <span class="d-none d-sm-block">{!! __('admin::label.zoom_plus') !!}</span>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-3" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                            <i class="fa fa-search-minus"></i> <span class="d-none d-sm-block"> {!! __('admin::label.zoom_minus') !!}</span>
                                        </button>
                                    </div>
                                    <br />
                                    */
                                @endphp
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate Left">
                                        <i class="fa fa-undo-alt"></i> <span class="d-none d-sm-block"> {!! __('admin::label.rotate_anti_clockwise') !!}</span>
                                    </button>
                                    <button type="button" class="btn btn-primary mb-3" data-method="rotate" data-option="90" title="Rotate Right">
                                        <i class="fa fa-redo-alt"></i> <span class="d-none d-sm-block"> {!! __('admin::label.rotate_clockwise') !!}</span>
                                    </button>
                                </div>
                                <br />
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                                        <i class="fa fa-sync-alt"></i> <span class="d-none d-sm-block"> {!! __('admin::label.reset') !!}</span>
                                    </button>
                                </div>
                                <br />


                                <br />
                                <button class="btn btn-primary mr-5" onclick="saveCrop('{!! $index !!}');" type="button">
                                    <i class="fa fa-save"></i> <span class="d-none d-sm-block"> {!! __('admin::label.save') !!}</span>
                                </button>
                                <br />
                                <br />
                                <button class="btn btn-light" data-method="destroy" onclick="cancelCropper('{!! $index !!}')" type="button"> <i class="fa fa-times"></i> <span class="d-none d-sm-block">{!! __('admin::label.cancel') !!}</span></button>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
<div class="modal-footer">
    <button class="btn btn-light" onclick="closeEditImage();">{!! __("admin::label.close") !!}</button>
</div>

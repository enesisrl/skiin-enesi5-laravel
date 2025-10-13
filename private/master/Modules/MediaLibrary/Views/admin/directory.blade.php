<div data-admin-media-library-directory='{"id": "{{ $directory->id }}"}'>
    @if(count($breadcrumb) > 1)
        <div class="card card-custom gutter-b">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    @foreach($breadcrumb as $item)
                        <li class="breadcrumb-item">
                            @if($item->url)
                                <a href="{{ $item->url }}" class="text-muted">{{ $item->description }}</a>
                            @else
                                <span class="text-muted">{{ $item->description }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(count($childs))
        <div class="h6">{{ $module->adminLang('directories') }}</div>
        <div class="row mb-5">
            @foreach($childs as $child)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-custom gutter-b card-stretch">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <a href="{{ $module->adminRoute('showDirectory', ['id' => $child->id]) }}">
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/icons/Files/Folder-solid.svg" />
                                    <span class="text-dark-75 font-weight-bold font-size-lg">{{ $child->description }}</span>
                                </a>
                            </h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="{{ $module->adminLang('actions') }}" data-placement="left">
                                    <button class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="{{ $module->adminRoute('showDirectory', ['id' => $child->id]) }}" class="navi-link">
                                                    <span class="navi-icon"><i class="la la-external-link-alt"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('open') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-separator my-3"></li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "rename-directory", "id": "{{ $child->id }}", "description": "{{ $child->description }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-edit"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('rename') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "move-directory", "id": "{{ $child->id }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-folder"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('move') }}</span>
                                                </a>
                                            </li>
                                            {{--
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="la la-download"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('download') }}</span>
                                                </a>
                                            </li>
                                            --}}
                                            <li class="navi-separator my-3"></li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "destroy-directory", "id": "{{ $child->id }}", "description": "{{ $child->description }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-trash"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('destroy') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(count($files))
        <div class="h6">{{ $module->adminLang('files') }}</div>
        <div class="row">
            @foreach($files as $file)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-custom gutter-b card-stretch">
                        <div class="card-header border-0">
                            <h3 class="card-title"></h3>
                            <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="{{ $file->getUrl() }}" target="_blank" class="navi-link">
                                                    <span class="navi-icon"><i class="la la-external-link-alt"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('preview') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "show-file-details", "id": "{{ $file->uuid }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-info-circle"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('details') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-separator my-3"></li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "rename-file", "id": "{{ $file->uuid }}", "description": "{{ $file->file_name }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-edit"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('rename') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "move-file", "id": "{{ $file->uuid }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-folder"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('move') }}</span>
                                                </a>
                                            </li>
                                            {{-- 
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="la la-tag"></i></span>
                                                    <span class="navi-text">Assegna tag</span>
                                                </a>
                                            </li>
                                            --}}
                                            <li class="navi-item">
                                                <a href="{{ $module->adminRoute('downloadFile', ['id' => $file->uuid]) }}" class="navi-link">
                                                    <span class="navi-icon"><i class="la la-download"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('download') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-separator my-3"></li>
                                            <li class="navi-item">
                                                <a href="#" data-admin-media-library='{"action": "destroy-file", "id": "{{ $file->uuid }}", "description": "{{ $file->file_name }}"}' class="navi-link">
                                                    <span class="navi-icon"><i class="la la-trash"></i></span>
                                                    <span class="navi-text">{{ $module->adminLang('destroy') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                @if($file->hasGeneratedConversion('thumb'))
                                    <img alt="" class="max-h-65px" src="{{ $file->getUrl('thumb') }}" />
                                @elseif($file->mime_type == 'text/csv')
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/files/csv.svg" />
                                @elseif($file->mime_type == 'application/msword')
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/files/doc.svg" />
                                @elseif($file->mime_type == 'image/jpeg')
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/files/jpg.svg" />
                                @elseif($file->mime_type == 'video/mp4')
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/files/mp4.svg" />
                                @elseif($file->mime_type == 'application/pdf')
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/files/pdf.svg" />
                                @elseif($file->mime_type == 'application/zip')
                                    <img alt="" class="max-h-65px" src="https://cdn.ene.si/master/20/media/svg/files/zip.svg" />
                                @else 
                                    
                                @endif
                                <a href="{{ $file->getUrl() }}" target="_blank" class="text-dark-75 font-weight-bold mt-15 font-size-lg">{{ $file->file_name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(!count($childs) && !count($files))
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-flex align-items-top p-5">
                    <div class="mr-6">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        @if(!$directory->parent_id) 
                            <p class="h4 text-dark text-hover-primary mb-5">{{ $module->adminLang('add_first_directory') }}</p>
                        @else
                            <p class="h4 text-dark text-hover-primary mb-5"><strong>{{ $directory->description }}</strong> {{ $module->adminLang('directory_is_empty') }}</p>
                        @endif
                        <div>
                            <button type="button" data-admin-media-library='{"action": "create-directory"}' class="btn btn-secondary">{{ $module->adminLang('add_directory') }}</button>
                            <button type="button" data-admin-media-library='{"action": "upload-file"}' class="btn btn-primary">{{ $module->adminLang('upload_file') }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    @endif
</div>
{{-- Topbar --}}
<div class="topbar">
    {{-- User --}}
    {{--
    <div class="topbar-item d-none d-sm-block">
        <p class="font-weight-bold"><i class="icon-xl la la-user text-success"></i> {{ Auth::user()->format_name }}</p>
    </div>
    --}}

    @php $admin_lang = Websites::current('adminLanguages'); @endphp
    @if ($admin_lang && count($admin_lang) > 1)

        <div class="dropdown">
            <!--begin::Toggle-->
            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    <img class="h-20px w-20px rounded-sm" src="{{config('metronic.resources.cdn')}}media/svg/flags/{{app()->getLocale().".svg"}}" alt="{!! \Illuminate\Support\Arr::get($admin_lang,app()->getLocale().".description") !!}" />
                </div>
            </div>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <!--begin::Nav-->
                <ul class="navi navi-hover py-4">
                    @foreach($admin_lang as $lang)
                        <li class="navi-item">
                            <a href="#" data-admin-change-language data-language_id="{{$lang['id']}}" data-href="{{ App::make('AuthModule')->adminRoute('auth-service-change-language') }}" class="navi-link">
                                <span class="symbol symbol-20 mr-3">
                                    <img src="{{config('metronic.resources.cdn')}}media/svg/flags/{{$lang['iso_code2'].".svg"}}" alt="{{$lang['iso_code2']}}" />
                                </span>
                                <span class="navi-text">{{$lang['description']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!--end::Nav-->
            </div>
        </div>

    @endif
    {{--
    <div class="topbar-item">
        @if (count(Auth::user()->user_profiles) > 1)
            <div class="dropdown">
                <button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-xl la la-globe-europe text-danger"></i> {{Auth::user()->current_profile}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach(Auth::user()->user_profiles as $profile)
                        @if (!$profile["current"])
                            <a class="dropdown-item" data-admin-change-profile data-website_id="{{$profile["website_id"]}}" data-role_id="{{$profile["role_id"]}}" data-href="{{ App::make('AuthModule')->adminRoute('auth-service-change-profile') }}" href="#">{{$profile["description"]}}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <p class="font-weight-bold"><i class="icon-xl la la-globe-europe text-danger"></i> {!! Auth::user()->user_login->website->description ?? \Master\Modules\Websites\Facades\Websites::current('description') !!}</p>
        @endif
    </div>



    --}}

    <!--begin::User-->
    <div class="topbar-item">
        <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2 mr-5" id="kt_quick_user_toggle">
            <p class="font-weight-bold"><i class="icon-xl la la-user text-success"></i> {{ Auth::user()->format_name }}</p>
        </div>
    </div>
    <!--end::User-->

    <div class="topbar-item">
        <a href="{{ App::make('AuthModule')->adminRoute('logout') }}" class="btn btn-light-primary font-weight-bold">{{ __('admin::label.logout') }}</a>
    </div>
</div>

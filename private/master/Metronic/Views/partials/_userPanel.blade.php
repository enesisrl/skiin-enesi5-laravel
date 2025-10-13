@php
    $currentUser = \Illuminate\Support\Facades\Auth::user();
@endphp
@if($currentUser)
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">{{ __('admin::users.user_profile') }}</h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <div class="navi navi-spacer-x-0 p-0">

                <div class="dropdown navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <i class="icon-xl la la-globe-europe text-danger"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            @if (count($currentUser->user_profiles) > 1)
                                <button class="btn dropdown-toggle font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$currentUser->current_profile}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($currentUser->user_profiles as $profile)
                                        @if (!$profile["current"])
                                            <a class="dropdown-item" data-admin-change-profile data-website_id="{{$profile["website_id"]}}" data-role_id="{{$profile["role_id"]}}" data-href="{{ App::make('AuthModule')->adminRoute('auth-service-change-profile') }}" href="#">{{$profile["description"]}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <p class="font-weight-bold nav-item mb-0"> {!! $currentUser->user_login->website->description ?? \Master\Modules\Websites\Facades\Websites::current('description') !!}</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold font-size-h5 text-dark-75">{{ $currentUser->format_name }}</p>
                    <div class="navi mt-2">
                        <div class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path
                                                        d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                        fill="#000000"/>
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted">{{ $currentUser->email }}</span>
								</span>
                        </div>
                        <a href="{{ App::make('AuthModule')->adminRoute('logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">{{ __('admin::label.logout') }}</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-5 mb-5"></div>
            <!--end::Separator-->
            <!--begin::Nav-->
            <div class="navi navi-spacer-x-0 p-0">
                <!--begin::Item-->
                <a href="{!! \Master\Modules\Users\Facades\Users::adminRoute('editProfile',['id'=>$currentUser->id]) !!}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <i class="icon-xl la la-user text-success"></i>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">{{ __('admin::users.edit_profile') }}</div>
                        </div>
                    </div>
                </a>
                <!--end:Item-->
                @if(config('two-factor.enabled',false))
                    <!--begin::Item-->
                    <a href="{!! \Master\Modules\Users\Facades\Users::adminRoute('twoFactor',['id'=>$currentUser->id]) !!}" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">
                                    <i class="icon-xl la la-shield-alt text-info"></i>
                                </div>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">{{ __('admin::users.2fa_menu_title') }}</div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->
                @endif
            </div>
            <!--end::Nav-->
            @if(config('push-notifications.web.enabled'))
                @include('PushNotificationsModule::components.user-panel')
            @endif
        </div>
        <!--end::Content-->
    </div>
@endif

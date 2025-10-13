        @php
            $admin_lang = Websites::current('adminLanguages');
        @endphp
        @if ($admin_lang && count($admin_lang) > 1)
            <div class="login-language-chooser">
                <div class="container">
                    <ul>
                        @foreach($admin_lang as $lang)
                            <li>
                                <a href="{{ route(Route::getCurrentRoute()->getName(),array_merge(["lang"=>$lang['iso_code2']],Route::getCurrentRoute()->parameters())) }}">
                                    <span class="symbol symbol-20 mr-3">
                                        <img src="{{config('metronic.resources.cdn')}}media/svg/flags/{{$lang['iso_code2'].".svg"}}" alt="{{$lang['iso_code2']}}" />
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

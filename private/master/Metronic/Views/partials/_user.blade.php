
{{-- Header --}}
<div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('//cdn.ene.si/master/20/media/misc/bg-1.jpg') }}')">
    <div class="d-flex align-items-center mr-2">
        {{-- Symbol --}}
        <div class="symbol bg-white-o-15 mr-3">
            <span class="symbol-label text-success font-weight-bold font-size-h4"><i class="lar la-user"></i></span>
        </div>

        {{-- Text --}}
        <div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{ Auth::user()->name }}</div>
    </div>
</div>




<div class="navi navi-spacer-x-0 pt-5">
    {{-- Item --}}
    <a href="#" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2"><i class="icon-xl la la-globe-europe text-success"></i></div>
            <div class="navi-text">
                @if (count(Auth::user()->user_websites) > 1)
                @else
                    <div class="font-weight-bold">{{Auth::user()->user_login->website->description}}</div>
                @endif
            </div>
        </div>
    </a>

    {{-- Item --}}
    <a href="#"  class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2"><i class="icon-xl la la-address-card text-warning"></i></div>
            <div class="navi-text">
                @if (count(Auth::user()->user_roles) > 1)

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->user_login->role->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach(Auth::user()->user_roles as $role)
                                <a class="dropdown-item" href="#">{{$role["description"]}}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="font-weight-bold">{{Auth::user()->user_login->role->name}}</div>
                @endif
            </div>
        </div>
    </a>

    {{-- Footer --}}
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer px-8 py-5">
        <a href="{{ App::make('AuthModule')->adminRoute('logout') }}" class="btn btn-light-primary font-weight-bold">{{ __('admin::label.logout') }}</a>
    </div>
</div>

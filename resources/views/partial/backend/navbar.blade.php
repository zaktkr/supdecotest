<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('admin.index') }}">
                        @php
                            $logo = App\Models\Logo::all()->first();
                        @endphp
                        @if ($logo->status == true && $logo->cover != '' && File::exists('backend/img/logos/' . $logo->cover))
                            <img class="brand-logo rounded-circle" alt="modern admin logo"
                                src="{{ asset('backend/img/logos/' . $logo->cover) }}">
                        @else
                            <img class="brand-logo rounded-circle" alt="modern admin logo"
                                src="{{ asset('backend/img/logos/default/defaultLogoRimPub.jpg') }}">
                        @endif
                        <h3 class="brand-text">{{ __('message.RIM PUB') }}</h3>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                        data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
                            data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">

                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                            id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i
                                class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }}"></i><span
                                class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i class="flag-icon flag-icon-{{ $localeCode }}"></i>
                                    {{ $properties['native'] }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        @auth
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">{{ __('message.bien venu') }},
                                    <span class="user-name text-bold-700">{{ auth()->user()->name }}</span>
                                </span>
                                @if (auth()->user()->user_img != '')
                                    <span class="avatar avatar-online">
                                        <img src="{{ asset('backend/img/profile/' . auth()->user()->user_img) }}"
                                            alt="avatar"><i></i></span>
                                @else
                                    <span class="avatar avatar-online">
                                        <img src="{{ asset('backend/img/profile/default/avatar.png') }}"
                                            alt="avatar"><i></i></span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('admin.admins.edit', Auth::user()->id) }}"><i
                                        class="ft-user"></i>
                                    {{ __('message.Modifier profile') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i
                                        class="ft-power"></i> {{ __('message.Se déconnecter') }}</a>
                            </div>
                        @endauth
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ route('admin.index') }}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.dash.main">{{ __('message.Dashboard') }}</span></a>
            </li>
            @if (Auth::user()->type === 1)
                <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('message.Administrateurs') }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('admin.admins.index') }}"
                                data-i18n="nav.templates.vert.main">{{ __('message.Administrateurs') }}</a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class=" nav-item"><a href="#"><i class="la la-sliders"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('message.Photo Animation') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.sliders.index') }}"
                            data-i18n="nav.templates.vert.main">{{ __('message.Photo Animation') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-photo"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('message.Logo') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.logos.index') }}"
                            data-i18n="nav.templates.vert.main">{{ __('message.Logo') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-list"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('message.Menu') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.menus.index') }}"
                            data-i18n="nav.templates.vert.main">{{ __('message.Menu') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-edit"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('message.Services') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.services.index') }}"
                            data-i18n="nav.templates.vert.main">{{ __('message.Services') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-facebook"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('message.Methode de Communication') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.type_communication.index') }}"
                            data-i18n="nav.templates.vert.main">{{ __('message.Methode de Communication') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="#"><i class="la la-check"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('message.Notre travail') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('admin.notre_travail.index') }}"
                            data-i18n="nav.templates.vert.main">{{ __('message.Notre travail') }}</a>
                    </li>
                </ul>
            </li>
    </div>
</div>

<!doctype html>
<html lang="en" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    {{-- 
    photo_animation
    logo
    menus
    services
    contacts
    travailles    
    --}}

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{ config('app.name') }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css-' . LaravelLocalization::getCurrentLocaleDirection() . '/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <div class="preloader">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header id="1" class="header-area">
        <div class="navigation fixed-top" style="background-color: rgb(64 61 61);">
            {{-- rgb(174 223 231); --}}
            {{-- rgb(0 0 0 / 0%) --}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="javascript::void()">
                                @if ($logo->status == true && $logo->cover != '' && File::exists('backend/img/logos/' . $logo->cover))
                                    <img class="brand-logo rounded-circle" width="70px" height="70px"
                                        alt="modern admin logo" src="{{ asset('backend/img/logos/' . $logo->cover) }}">
                                @else
                                    <img class="brand-logo rounded-circle" width="70px" height="70px"
                                        alt="modern admin logo"
                                        src="{{ asset('backend/img/logos/default/defaultLogoRimPub.jpg') }}">
                                @endif
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>



                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="navbar-nav m-auto">
                                    @foreach ($menus as $menu)
                                        <li class="nav-item"><a class="page-scroll mr-1"
                                                href="#{{ $loop->iteration }}">{{ $menu->name }}</a></li>
                                    @endforeach
                                    {{-- <li class="nav-item active"><a class="page-scroll mr-1" href="#home">Accueil</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#service">Service</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#travail">Travail</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#contact">Contact</a></li>
                                    <li class="nav-item"><a class="page-scroll" href="#footer">a propo</a></li> --}}
                                </ul>
                                <ul class="nav float-right">
                                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                            id="dropdown-flag" href="#" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i
                                                class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }}"></i><span
                                                class="selected-language"></span></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="dropdown-item mr-1" hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    <i class="flag-icon flag-icon-{{ $localeCode }}"></i>
                                                    {{ $properties['native'] }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <!-- begin slider -->
        <div class="container">
            <div class="col-md-12">
                <div class="slider img-responsive text-center">
                    @foreach ($photo_animation as $photo)
                        <img src="{{ asset('backend/img/sliders/' . $photo->firstMedia->name_file) }}" alt="photo"
                            class="img_slider active img-responsive" />
                    @endforeach
                    <div class="suivant">
                        <i class="fas fa-chevron-circle-right"></i>
                    </div>
                    <div class="precedent">
                        <i class="fas fa-chevron-circle-left"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- end slider -->
    </header>
    <section id="5" class="services-area gray-bg pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-30">
                        <h2 class="title">{{ __('message.Services aux entreprises') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            <div class="service-icon">
                                @if ($service->firstMedia != '')
                                    <img src="{{ asset('backend/img/services/' . $service->firstMedia->name_file) }}"
                                        class="img-thumbnail" width="150px" alt="photo">
                                @else
                                    No img
                                @endif
                            </div>
                            <div class="service-content">
                                <h4 class="service-title"><a href="#">{{ $service->name }}</a></h4>
                                <p>{!! $service->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="4" class="work-area pt-125 pb-130" style="background-color: rgb(108, 116, 116)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">{{ __('message.Exemples de notre travail') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                @foreach ($travailles as $travail)
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-service text-center mt-30">
                            date : {{ $travail->updated_at }}
                            <div class="service-content">
                                <p>{!! $travail->description !!}</p>
                                <p>suivre le <a href="{{ $travail->link }}" target="_blank">lien</a></p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="2" class="contact-area pt-125 pb-130 gray-bg" style="background-color: rgb(142, 202, 255)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">{{ __('message.Contactez nous') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($contacts as $contact)
                    <div class="col-lg-4 col-md-6 col-sm-7">
                        <div class="contact-box text-center mt-30">
                            <a href="{{ $contact->link }}" target="_blank">
                                <div class="contact-icon">
                                    @if ($contact->firstMedia != '')
                                        <img src="{{ asset('backend/img/communications/' . $contact->firstMedia->name_file) }}"
                                            class="img-thumbnail" width="150px" alt="photo">
                                    @else
                                        No img
                                    @endif
                                </div>
                                <div class="contact-content">
                                    <h6 class="contact-title">{{ $contact->type_communication }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="contact-form pt-30">
                        <form id="contact-form" action="{{ asset('assets/contact.php') }}">
                            <div class="single-form">
                                <input type="text" name="name" placeholder="{{ __('message.Nom') }}">
                            </div>
                            <div class="single-form">
                                <input type="email" name="email" placeholder="{{ __('message.Email') }}">
                            </div>
                            <div class="single-form">
                                <textarea name="message" placeholder="{{ __('message.Message') }}"></textarea>
                            </div>
                            <p class="form-message"></p>
                            <div class="single-form">
                                <button class="main-btn" type="submit">{{ __('message.Envoiyer') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="3" class="footer-area">
        <div class="footer-widget pt-130 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <h1>{{ __('message.À propos de l\'entreprise') }}</h1>
                            <p class="mt-">{{ __('message.a_propos') }}</p>
                            <ul>
                                <li><span>{{ __('message.whatsapp') }} : 49874807</span></li>
                                <li>
                                    <div>{{ __('message.facebook') }} : مؤسسة ريم للإشهار rim pub</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center pt-20">
                            <p>Copyright © ZAK <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>


    <script src="{{ asset('assets/js/parallax.min.js') }}"></script>

    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>



    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>


    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>



    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('app.js') }}"></script>

</body>

</html>

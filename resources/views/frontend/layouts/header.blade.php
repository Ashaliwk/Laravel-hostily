<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Hostily</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sass/style.css') }}">

</head>
<body>

    <div class="header__sticky">
        <div class="header__area">
            <div class="container custom__container">
                <div class="header__area-menubar">
                    <div class="header__area-menubar-left">
                        <div class="header__area-menubar-left-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                            <div class="responsive-menu"></div>
                        </div>
                    </div>
                    <div class="header__area-menubar-right">
                        <div class="header__area-menubar-right-menu menu-responsive">
                            <ul id="mobilemenu">
                                <li class="menu-item"><a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('/about') }}">About</a></li>
                                        <li><a href="{{ url('/servicesteam') }}">Team</a></li>
                                        <li><a href="{{ url('/servicesdetails') }}">Services Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Room</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('/roomstyle') }}">Room Style</a></li>
                                        <li><a href="{{ url('/roommodern') }}">Room Modern</a></li>
                                        <li><a href="{{ url('/roomlist') }}">Room List</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/blogdetails') }}">Blog</a>
                                </li>
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header__area-menubar-right-box">
                        <div class="header__area-menubar-right-box-btn">
                            <a class="theme-btn" href="{{url('/book')}}">Book Now<i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
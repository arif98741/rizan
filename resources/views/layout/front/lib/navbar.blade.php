<?php
$site = \Illuminate\Support\Facades\Cache::get('site_details');
?>
@if(\Request::route()->getName() == 'home')
    <section class="navigation-home fixed-top">
        <div class="nav-container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img style="height: 50px;" src="{{ asset('asset/front/img/logo.png')}}" alt="logo - {{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/offers') }}">Offers <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/restaurants') }}">Restaurants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/foods') }}">Foods</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/places') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('page/about-us') }}">About us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
@else

    <section class="navigation-with-search fixed-top">
        <div class="nav-container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img style="height: 50px;" src="{{ asset('asset/front/img/logo.png')}}" alt="logo - {{ url('/') }}">
                </a>
                <a class="navbar-toggler show-on-sml" onclick="showSearch()"> <i class="fas fa-search"></i> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/offers') }}">Offers <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/restaurants') }}">Restaurants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/foods') }}">Foods</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/places') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('page/about-us') }}">About us</a>
                        </li>
                        <li class="nav-item hide-on-sml">
                            <a class="nav-link" onclick="showSearch()"> <i class="fas fa-search"></i> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="hidden-search-bar" id="hidden-search-bar">
            <div class="nav-container">
                <div class="input-group">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" autofocus="">
                    <div class="input-group-append">
                        <span class="input-group-text cross-btn" onclick="hideSearch()"> <i
                                class="far fa-times-circle"></i> </span>
                        <span class="input-group-text srch-btn"> <i class="fas fa-search"></i> </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif


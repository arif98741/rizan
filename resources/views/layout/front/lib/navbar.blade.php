<?php
$site = \Illuminate\Support\Facades\Cache::get('site_details');

?>
<section class="navigation-home fixed-top">
    <div class="nav-container">
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('asset/front/img/logo.png')}}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
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

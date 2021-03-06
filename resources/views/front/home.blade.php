@extends('layout.front.front')
@section('title','Home')
@section('content')

    @include('layout.front.lib.home_hero')
    <!-- popular restaurant start -->
    <section class="popular-res-home">
        <div class="popular-res-full">
            <h1 class="headline">Popular Restaurants</h1>
            <div class="popular-res-container">

                <div class="row">

                    @foreach($feature_restaurants as $feature_restaurant)
                        <div class="col-sm-6 item-each">
                            <a href="{{ url('restaurant/'.$feature_restaurant->restaurant->slug) }}">
                                <img class="img-fluid" style="width: 100%"
                                     src="{{ asset('uploads/restaurant/thumbnail/'.$feature_restaurant->restaurant->feature_photo)}}"
                                     alt="{{ $feature_restaurant->restaurant->name }} - {{ url('/') }}">
                                <div class="title">
                                    <div class="title-left">
                                        <h4>{{ $feature_restaurant->restaurant->name }}</h4>
                                    </div>
                                    <div class="title-right">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $feature_restaurant->restaurant->location }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>


            </div>
        </div>
        <div class="text-center">
            <button onclick="window.location='{{ url('/restaurants') }}'" class="see-more-btn">See more</button>
        </div>
    </section>
    <!-- popular restaurant end -->

    <!-- popular product start -->
    <section class="popular-food-home">
        <div class="popular-food-full">
            <h1 class="headline">Popular Foods</h1>
            <div class="popular-food-container">


                <div class="row">
                    @foreach($foods as $food)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('product/'.$food->restaurant_slug.'/'.$food->slug) }}">
                                <img src="{{ asset('uploads/product/thumbnail/'.$food->feature_photo) }}"
                                     style="width: 100%;" class="img-fluid"
                                     Get New Account
                                     alt="{{ $food->name }} - {{ url('/') }}">
                                <div class="title">
                                    <h5 class="name">{{ $food->name }}</h5>
                                    <p class="price">BDT {{ $food->price }}</p>
                                    <div class="review-icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="res-avl">Available on <span>{{ $food->restaurant_name }}</span></p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text-center">
            <button onclick="window.location='{{ url('/foods') }}'" class="see-more-btn">See more</button>
        </div>
    </section>
    <!-- popular product end -->

@endsection

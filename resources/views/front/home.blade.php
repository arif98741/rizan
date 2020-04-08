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

                    @foreach($restaurants as $restaurant)
                        <div class="col-sm-6 item-each">
                            <a href="{{ url('restaurant/'.$restaurant->slug) }}">
                                <img class="img-fluid" src="{{ asset('storage/uploads/restaurant/feature/'.$restaurant->feature_photo)}}" alt="">
                                <div class="title">
                                    <div class="title-left">
                                        <h4>{{ $restaurant->name }}</h4>
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
                                        <span>{{ $restaurant->location }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>


            </div>
        </div>
        <div class="text-center">
            <button class="see-more-btn">See more</button>
        </div>
    </section>
    <!-- popular restaurant end -->

    <!-- popular food start -->
    <section class="popular-food-home">
        <div class="popular-food-full">
            <h1 class="headline">Popular Foods</h1>
            <div class="popular-food-container">

                <div class="row">
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-3.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
                                <div class="review-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="res-avl">Available on <span>Grandiose restaurant</span></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-4.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
                                <div class="review-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="res-avl">Available on <span>Grandiose restaurant</span></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-3.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
                                <div class="review-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="res-avl">Available on <span>Grandiose restaurant</span></p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-3.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
                                <div class="review-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="res-avl">Available on <span>Grandiose restaurant</span></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-4.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
                                <div class="review-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="res-avl">Available on <span>Grandiose restaurant</span></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-3.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
                                <div class="review-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="res-avl">Available on <span>Grandiose restaurant</span></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="see-more-btn">See more</button>
        </div>
    </section>
    <!-- popular food end -->

@endsection

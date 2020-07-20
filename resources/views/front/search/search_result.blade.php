@extends('layout.front.front')
@section('title','Home')
@section('content')
    {{--Restaurant Result--}}

    <section class="res-list-search">
        <div class="">
            <h2 class="headline">Matched Restaurant</h2>
            <div class="menu-container">

                <div class="row">
                    @foreach($restaurants as $restaurant)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('restaurant/view/'.$restaurant->slug) }}">
                                <img class="img-fluid"
                                     src="{{ asset('uploads/restaurant/thumbnail/'.$restaurant->feature_photo)}}"
                                     alt="{{ $restaurant->name }} - {{ url('/') }}">
                                <div class="title">
                                    <h5 class="name">{{ $restaurant->name }}</h5>
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $restaurant->location }}</span>
                                    </div>
                                    <div class="review-icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>


            </div>
        </div>
    </section>
    {{--Restaurant Result End--}}


    {{--FOOD RESULT Start--}}

    <section class="food-list-search">
        <div class="">
            <h2 class="headline">Matched Food</h2>
            <div class="menu-container">

                <div class="row">
                    @foreach($foods as $food)
                        <div class="col-sm-4 item-each">
                            <a href="#">
                                <img class="img-fluid" src="{{ asset('uploads/food/thumbnail/'.$food->feature_photo) }}"
                                     alt="{{ asset('uploads/food/thumbnail/'.$food->feature_photo) }}">
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
                                    <p class="res-avl">Available on <span>{{ $food->restaurant->name }}</span></p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>
    {{--FOOD RESULT END--}}

    {{--Place RESULT Start--}}
{{--TODO:: need to work here--}}
    <section style="display: none" class="food-list-search">
        <div class="">
            <h2 class="headline">Matched Food</h2>
            <div class="menu-container">

                <div class="row">
                    @foreach($places as $place)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('place/'.$place->slug) }}">
                                <img class="img-fluid"
                                     src="{{ asset('uploads/place/thumbnail/'.$place->feature_photo) }}"
                                     alt="{{ $place->place_name }} - {{ url('/') }}">
                                <div class="title">
                                    <h5 class="name">{{ $place->location }}</h5>
                                    <p class="price">BDT {{ $place->price }}</p>
                                    <div class="review-icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>
    {{--Place RESULT END--}}
@endsection

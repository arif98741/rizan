@extends('layout.front.front')
@section('title','Home')
@section('content')
    {{--Restaurant Result--}}

    @if($restaurants->count() > 0)
        <section class="res-list-search">
            <div class="">
                <h2 class="headline">Matched Restaurant</h2>
                <div class="menu-container">

                    <div class="row">
                        @foreach($restaurants as $restaurant)
                            <div class="col-sm-4 item-each">
                                <a href="{{ url('restaurant/'.$restaurant->slug) }}">
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
                                            <?php
                                            $count = $restaurant->restaurant_review->count();
                                            $rating = $restaurant->restaurant_review->sum('rating');
                                            if ($count == 0) {
                                                $totalRating = 0;
                                            } else {

                                                $totalRating = $rating / $count;
                                            }
                                            $intTotalRating = floor($totalRating);
                                            $fraction = $totalRating - $intTotalRating;
                                            ?>
                                            @for($i=1; $i<=$totalRating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @if(is_numeric( $fraction ) && floor( $fraction ) != $fraction)
                                                <i class="fas fa-star-half"></i>
                                            @endif

                                            @for($i=1; $i<=(5-$totalRating); $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                            <span>({{ number_format((float)$totalRating, 2, '.', '') }} of {{ $count }} ratings)</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>


                </div>
            </div>
        </section>
    @else
        <section class="res-list-search mt-3">
            <div class="">
                <div class="menu-container">
                    <h4 class="text-center">
                        No Restaurant data found
                    </h4>

                </div>
            </div>

        </section>
    @endif

    {{--Restaurant Result End--}}


    {{--FOOD RESULT Start--}}
    @if($foods->count() > 0)
        <section class="food-list-search">
            <div class="">
                <h2 class="headline">Matched Food</h2>
                <div class="menu-container">

                    <div class="row">
                        @foreach($foods as $food)
                            <div class="col-sm-4 item-each">
                                <a href="{{ url('food/'.$food->restaurant->slug.'/'.$food->slug) }}">
                                    <img class="img-fluid"
                                         src="{{ asset('uploads/food/thumbnail/'.$food->feature_photo) }}"
                                         alt="{{ asset('uploads/food/thumbnail/'.$food->feature_photo) }}">
                                    <div class="title">
                                        <h5 class="name">{{ $food->name }}</h5>
                                        <p class="price">BDT {{ $food->price }}</p>
                                        <div class="review-icon">
                                            <?php
                                            $count = $food->food_review->count();
                                            $rating = $food->food_review->sum('rating');
                                            if ($count == 0) {
                                                $totalRating = 0;
                                            } else {

                                                $totalRating = $rating / $count;
                                            }
                                            $intTotalRating = floor($totalRating);
                                            $fraction = $totalRating - $intTotalRating;
                                            ?>
                                            @for($i=1; $i<=$totalRating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @if(is_numeric( $fraction ) && floor( $fraction ) != $fraction)
                                                <i class="fas fa-star-half"></i>
                                            @endif

                                            @for($i=1; $i<=(5-$totalRating); $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                            <span>({{ $totalRating }} of {{ $count }} ratings)</span>
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
    @else
        <section class="food-list-search mt-3">
            <div class="">
                <div class="menu-container">

                    <h4 class="text-center"> No food found
                    </h4>
                </div>
            </div>
        </section>
    @endif
    {{--FOOD RESULT END--}}

    {{--Place RESULT Start--}}
    @if($places->count() > 0)
        {{--TODO:: need to work here--}}
        <section class="food-list-search">
            <div class="">
                <h2 class="headline">Matched Place</h2>
                <div class="menu-container">

                    <div class="row">
                        @foreach($places as $place)
                            <div class="col-sm-4 item-each">
                                <a href="{{ url('place/'.$place->slug) }}">
                                    <img class="img-fluid"
                                         src="{{ asset('uploads/place/thumbnail/'.$place->feature_photo) }}"
                                         alt="{{ $place->place_name }} - {{ url('/') }}">
                                    <div class="title">
                                        <h5 class="name">{{ $place->place_name }}</h5>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </section>
    @else
        <section class="food-list-search" style="display: none">
            <div class="">
                <div class="menu-container">
                    <h4 class="text-center">
                        No place found
                    </h4>
                </div>
            </div>
        </section>
    @endif
    {{--Place RESULT END--}}
@endsection

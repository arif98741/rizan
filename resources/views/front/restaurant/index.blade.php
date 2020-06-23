@extends('layout.front.front')
@section('title','Restaurants')
@section('content')
    <!-- hero start -->
    <section class="hero-all-restaurant">
        <h2 class="all-restaurant-heading"><span>All Restaurants in Cumilla</span></h2>
    </section>

    <section class="menu-all-restaurant">
        <div class="menu-full">
            <div class="menu-container">

                <div class="row">
                    @foreach($restaurants as  $restaurant)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('restaurant/view/'.$restaurant->slug) }}">
                                <img class="img-fluid"
                                     src="{{ asset('storage/uploads/restaurant/thumbnail/'.$restaurant->feature_photo)}}"
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
        <div class="row">
            <div class="offset-md-5 ">

            </div>
            <div class="col-md-4">
                <nav aria-label="Page navigation example pull-right">
                    {{ $restaurants->links() }}
                </nav>
            </div>
        </div>
    </section>
    <!-- menu end -->

@endsection

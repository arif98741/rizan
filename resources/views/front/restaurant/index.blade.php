@extends('layout.front.front')
@section('title','Restaurants')
@section('content')
    <!-- hero start -->
    <section class="hero-all-restaurant">
        <h2 class="all-restaurant-heading"><span>All Restaurants in Cumilla</span></h2>
    </section>
    <!-- hero end -->

    <!-- menu start -->
    <section class="menu-all-restaurant">
        <div class="menu-full">
            <div class="menu-container">

                <div class="row">
                    @foreach($restaurants as  $restaurant)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('restaurant/'.$restaurant->slug) }}">
                                <img class="img-fluid" src="{{ asset('asset/front/img/food-img1.png')}}" alt="">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#">Page</a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </section>
    <!-- menu end -->

@endsection

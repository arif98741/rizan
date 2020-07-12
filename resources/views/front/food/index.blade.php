@extends('layout.front.front')
@section('title','Restaurants')
@section('content')
    <!-- hero start -->
    <section class="hero-all-food">
        <h2 class="all-food-heading"><span>All Available Foods</span></h2>
    </section>
    <!-- hero end -->

    <!-- menu start -->
    <section class="menu-all-food">
        <div class="menu-full">
            <div class="menu-container">

                <div class="row">
                    @foreach($foods as $food)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('food/'.$food->restaurant->slug.'/'.$food->slug) }}">
                                <img style="width: 100%;" class="img-fluid"
                                     src="{{ asset('uploads/food/thumbnail/'.$food->feature_photo)}}"
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
                                    <p class="res-avl">Available on <span>{{ $food->restaurant->name }}</span></p>
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
                    {{ $foods->links() }}
                </nav>
            </div>
        </div>
    </section>

@endsection

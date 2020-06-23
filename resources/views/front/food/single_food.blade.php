@extends('layout.front.front')
@section('title',$food->name. ' | '. $food->restaurant->name)
@section('content')

    <section class="hero-single-food">
        <div class="hero-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="food-info">
                        <h5 class="food-name">{{ $food->name }}</h5>
                        <span class="price">BDT {{ $food->price }}</span>
                        <div class="review-icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <h6 class="res-name"><a href="#">{{ $food->restaurant->name }}</a></h6>
                        <p class="description black-clr-txt">{{ $food->description }}</p>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-2 food-img">
                    <img src="{{ asset('storage/uploads/food/thumbnail/'.$food->feature_photo)}}"
                         alt="{{ $food->name }} - {{ url('/') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->

    <!-- submit review start -->
    <section class="submit-review-single-food">
        <h2 class="headline">Submit a review</h2>
        <div class="review-container">
            <form action="">
                <div class="row">
                    <div class="col-sm-6">
                        <input class="form-control" type="text" placeholder="Your name">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" placeholder="Your Email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="5" placeholder="Your comment about this food"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <div class="review-icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </form>

            <div class="text-center">
                <button class="review-btn">Submit</button>
            </div>
        </div>
    </section>
    <!-- submit review end -->

    <!-- review & comments start -->
    <section class="review-rating-read-sin-food">
        <h2 class="headline">Review and Rating</h2>
        <div class="review-rating-container">
            <div class="single-comment">
                <div class="row">
                    <div class="col">
                        <h5 class="person-name">Pronab Bissas</h5>
                    </div>
                    <div class="col">
                        <div class="review-icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="date">
                    <span class="review-date">18 Feb 2020</span>
                    <hr>
                </div>
                <p class="black-clr-txt">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus velit
                    tenetur modi distinctio, eligendi earum eveniet quasi consequatur porro est dolorum dolor cum
                    aliquid laborum nihil sequi quod adipisci quis?</p>
            </div>

            <div class="single-comment">
                <div class="row">
                    <div class="col">
                        <h5 class="person-name">Imran Khan</h5>
                    </div>
                    <div class="col">
                        <div class="review-icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="date">
                    <span class="review-date">18 Feb 2020</span>
                    <hr>
                </div>
                <p class="black-clr-txt">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus velit
                    tenetur modi distinctio, eligendi earum eveniet quasi consequatur porro est dolorum dolor cum
                    aliquid laborum nihil sequi quod adipisci quis?</p>
            </div>
        </div>
    </section>
@endsection

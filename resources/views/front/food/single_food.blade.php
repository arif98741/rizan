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
                        <h6 class="res-name"><a
                                href="{{ url('restaurant/view/'.$food->restaurant->slug) }}">{{ $food->restaurant->name }}</a>
                        </h6>
                        <p class="description black-clr-txt">{{ $food->description }}</p>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-2 food-img">
                    <img src="{{ asset('uploads/food/feature/'.$food->feature_photo)}}"
                         alt="{{ $food->name }} - {{ url('/') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->

    <!-- submit review start -->
    <section class="submit-review-single-res" id="review-message">
        <h2 class="headline">Submit a review</h2>

        <div class="review-container">
            @if(Session::has('success'))
                <p class="alert alert-success" id="message">{{ Session::get('success') }}</p>
            @endif @if(Session::has('error'))
                <p class="alert alert-warning" id="message">{{ Session::get('error') }}</p>
            @endif
            <form action="{{ url('food/comment') }}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-sm-6">
                        <input name="name" class="form-control" type="text" placeholder="Your name">
                        @error('name')
                        <p class="text-red mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input name="email" class="form-control" type="email" placeholder="Your Email">
                        @error('email')
                        <p class="text-red mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <textarea name="comment" class="form-control" rows="5"
                                  placeholder="Your comment about this restaurant"></textarea>
                        @error('comment')
                        <p class="text-red mt-1">{{ $message }}</p>
                        @enderror
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


                <div class="text-center">
                    <input name="food_id" class="form-control" type="hidden" value="{{ $food->id }}"
                           placeholder="Food id">
                    <input name="restaurant_id" class="form-control" type="hidden" value="{{ $food->restaurant_id }}"
                           placeholder="Restaurant id">


                    <button type="submit" class="review-btn">Submit</button>
                </div>
            </form>

        </div>
    </section>
    <!-- submit review end -->

    <!-- review & comments start -->
    <section class="review-rating-read">
        <h2 class="headline">Review and Rating</h2>
        <div class="review-rating-container">

            @if($reviews->count()>0)
                @foreach($reviews as $review)
                    <div class="single-comment">
                        <div class="row">
                            <div class="col">
                                <h5 class="person-name">{{ $review->name }}</h5>
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
                            <span class="review-date">{{ date('d M Y',strtotime($review->created_at)) }}</span>
                            <hr>
                        </div>
                        <p class="black-clr-txt">{{ $review->comment }}</p>
                    </div>
                @endforeach
            @else
                <hr>
                <span class="text-bold text-center">No reviews yet</span>
                <hr>
            @endif
        </div>
    </section>
    <div class="row">
        <div class="offset-md-5 ">

        </div>
        <div class="col-md-4">
            <nav aria-label="Page navigation example pull-right">
                {{ $reviews->links() }}
            </nav>
        </div>
    </div>

@endsection

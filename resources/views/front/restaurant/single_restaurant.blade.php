@extends('layout.front.front')
@section('title', $restaurant->name)
@section('content')

    <!-- hero start -->
    <section class="hero-single-res"
             style="background: url({{ asset('uploads/restaurant/cover/'.$restaurant->cover_photo) }})">
        <div class="map-img">
            <iframe width="100%" height="100%"
                    src="{{ $restaurant->map_code }}"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

            </iframe>
        </div>
    </section>
    <!-- hero end -->

    <!-- restaurant info. start -->
    <div class="res-info-container">
        <div class="res-info">
            <h5 class="res-name">{{ $restaurant->name }}</h5>
            <span class="res-type">{{ $restaurant->restaurant_category->category_name }}</span>
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

            <div class="social-icon">
                <ul>
                    <li>
                        <a href="@if(!empty($restaurant->facebook)) http://{{ $restaurant->facebook }} @else#@endif"
                           target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        </i>
                    </li>
                    <li>
                        <a href="@if(!empty($restaurant->instagram)) http://{{ $restaurant->instagram }} @else#@endif"
                           target="_blank"
                        >
                            <i class="fab fa-instagram"></i>
                        </a>
                        </i>
                    </li>
                    <li>
                        <a href="@if(!empty($restaurant->website)) http://{{ $restaurant->website }} @else#@endif"
                           target="_blank"
                        >
                            <i class="fas fa-globe"></i>
                        </a>
                        </i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- restaurant info. end -->

    <!-- menu start -->
    <section class="menu-sngl-res">
        <div class="menu-full">
            <h2 class="headline">Food Items</h2>
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
    <!-- menu end -->

    <!-- submit review start -->
    <section class="submit-review-single-res" id="review-message">
        <h2 class="headline">Submit a review</h2>

        <div class="review-container">
            @if(Session::has('success'))
                <p class="alert alert-success" id="message">{{ Session::get('success') }}</p>
            @endif @if(Session::has('error'))
                <p class="alert alert-warning" id="message">{{ Session::get('error') }}</p>
            @endif
            <form action="{{ url('restaurant/comment') }}" method="post">
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
                    <input name="restaurant_id" class="form-control" type="hidden" value="{{ $restaurant->id }}"
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
                <p class="text-bold text-center no-review">No reviews yet</p>
                <hr>
            @endif
        </div>
    </section>
    <nav>
        {{ $reviews->links() }}
    </nav>
    <!-- menu end -->
    @push('extra-js')
        <script>
            $(document).ready(function () {
             //   $('nav').addClass('pagination justify-content-center');
            });
        </script>
    @endpush

@endsection

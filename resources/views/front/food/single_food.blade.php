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
                        <div class="review-icon total-review">
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

                        <h6 class="res-name"><a
                                href="{{ url('restaurant/'.$food->restaurant->slug) }}">{{ $food->restaurant->name }}</a>
                        </h6>
                        <p class="description black-clr-txt">{{ $food->description }}</p>
                    </div>
                </div>

                <div class="col-md-6 order-first order-md-2 food-img">
                    <img src="{{ asset('uploads/product/feature/'.$food->feature_photo)}}"
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
            <form action="{{ url('product/comment') }}" method="post">
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
                                  placeholder="Your comment about this food"></textarea>
                        @error('comment')
                        <p class="text-red mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="review-icon single-review">
                            <i class="far fa-star star-id1" sl="1"></i>
                            <i class="far fa-star star-id2" sl="2"></i>
                            <i class="far fa-star star-id3" sl="3"></i>
                            <i class="far fa-star star-id4" sl="4"></i>
                            <i class="far fa-star star-id5" sl="5"></i>
                            <br>
                            @error('rating')
                            <small class="text-red mt-1">{{ $message }}</small><br>
                            @enderror
                            <small>You can give rating from 1 to 5 range where 1 is poor and 5 is excellent</small>
                            <input type="hidden" name="rating" id="rating-value">

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
                                    @for($i=1; $i<=$review->rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @for($i=1; $i<=(5-$review->rating); $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="date">
                            <span class="review-date">{{ date('d M Y',strtotime($review->created_at)) }}</span>
                            <hr>
                        </div>
                        <p class="black-clr-txt">{{  \ConsoleTVs\Profanity\Builder::blocker($review->comment)->filter()  }}</p>
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

    <style>
        .single-review .far,
        .single-review .fas {
            cursor: pointer;
        }
    </style>

    <!-- menu end -->
    @push('extra-js')
        <script>
            $(document).ready(function () {
                $('nav').addClass('pagination justify-content-center');
                $('.single-review .fa-star').click(function () {
                    let sl = $(this).attr('sl');

                    for (i = 1; i <= 5; i++) {

                        $('.star-id' + i).removeClass('fas');
                    }
                    for (i = 1; i <= sl; i++) {

                        $('.star-id' + i).addClass('fas');
                    }
                    $('#rating-value').val(sl);
                });
            });
        </script>
    @endpush
@endsection

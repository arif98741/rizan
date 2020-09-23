@extends('layout.front.front')
@section('title','All Foods')
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
                            <a href="{{ url('product/'.$food->restaurant->slug.'/'.$food->slug) }}">
                                <img style="width: 100%;" class="img-fluid"
                                     src="{{ asset('uploads/product/thumbnail/'.$food->feature_photo)}}"
                                     alt="{{ $food->name }} - {{ url('/') }}">
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

        {{ $foods->links() }}

    </section>

    <!-- menu end -->
    @push('extra-js')
        <script>
            $(document).ready(function () {
                $('.menu-all-product nav').addClass('pagination justify-content-center');
            });
        </script>
    @endpush

@endsection

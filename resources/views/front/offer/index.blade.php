@extends('layout.front.front')
@section('title','Offers')
@section('content')
    <section class="hero-current-offer">
        <h2 class="current-offer-heading"><span>Current Offers</span></h2>
    </section>
    <!-- hero end -->


    <!-- offer item start -->
    @foreach($offers as $offer)
        <section class="offer-item">
            <div class="offer-item-container">
                <div class="row">
                    <div class="col-sm-4 img-part">
                        <img class="img-fluid"
                             src="{{ asset('uploads/food/thumbnail/'.$offer->food->feature_photo)}}" alt="">
                    </div>
                    <div class="col-sm-8 desc-part">
                        <h5 class="food-name"><a
                                href="{{ url('food/'.$offer->restaurant->slug.'/'.$offer->food->slug) }}">{{ $offer->food->name }}</a>
                        </h5>
                        <span class="prev-price">BDT {{ $offer->food->price }}</span>
                        <span class="offer-price">BDT {{ $offer->offer_price }}</span>
                        <p class="offer-start mt-2">Offer Start: {{ date('d M Y',strtotime($offer->start_date)) }}</p>
                        <p class="offer-end mb-2">Offer End: {{ date('d M Y',strtotime($offer->end_date)) }}</p>
                        <p class="offer-desc">
                            {{ $offer->offer_description }}
                        </p>
                        <h6 class="res-name"><span>On</span> <a
                                href="{{ url('restaurant/'.$offer->restaurant->slug) }}">{{ $offer->restaurant->name }}</a>
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <nav>
        {{ $offers->links() }}
    </nav>

    <!-- menu end -->
    @push('extra-js')
        <script>
            $(document).ready(function () {
                $('nav').addClass('pagination justify-content-center');
            });
        </script>
    @endpush

@endsection

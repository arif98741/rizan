@extends('layout.front.front')
@section('title', $place->place_name)
@section('content')
    <section class="hero-single-place">
        <div class="hero-container">
            <div class="row">
                <div class="col-lg-8">
                    <img class="img-fluid place-img"
                         src="{{ asset('uploads/place/feature/'.$place->feature_photo) }}"
                         alt="{{ $place->place_name }} - {{ url('/') }}">
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->

    <!-- place description start -->
    <section class="single-place-desc">
        <div class="single-place-container">
            <div class="row">
                <div class="place-info col-12">
                    <h4 class="place-name">{{ $place->place_name }}</h4>
                    <div class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $place->location }}</span>
                    </div>
                    <p class="description black-clr-txt">
                        {!! $place->initial_details !!}
                    </p>
                    <h5 class="what-see-heading">সেখানে যা যা দেখবেন:</h5>
                    <p class="what-see black-clr-txt">
                        {!! $place->tourist_attractions !!}
                    </p>
                    <h5 class="how-goto-heading">যেভাবে যাবেন:</h5>
                    <p class="how-goto black-clr-txt">{!! $place->how_to_go !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @push('extra-js')
        <script>
            $(document).ready(function () {
                //alert('hello');
            });
        </script>
    @endpush

@endsection

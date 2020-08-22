@extends('layout.front.front')
@section('title','Places')
@section('content')
    <!-- hero start -->
    <section class="hero-all-place">
        <h2 class="all-place-heading"><span>Visiting Places in Cumilla</span></h2>
    </section>
    <!-- hero end -->

    <!-- menu start -->
    <section class="menu-all-place">
        <div class="menu-full">
            <div class="menu-container">

                <div class="row">
                    @foreach($places as $key => $place)
                        <div class="col-sm-4 item-each">
                            <a href="{{ url('place/'.$place->slug) }}">
                                <img class="img-fluid"
                                     src="{{ asset('uploads/place/thumbnail/'.$place->feature_photo) }}"
                                     alt="{{ $place->place_name }} - {{ url('/') }}">
                                <div class="title">
                                    <h5 class="name">{{ $place->place_name }}</h5>
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $place->location }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>


            <nav>
                {{ $places->links() }}
            </nav>

        </div>

    </section>
    <!-- menu end -->
    <!-- menu end -->
    @push('extra-js')
        <script>
            $(document).ready(function () {
                $('nav').addClass('pagination justify-content-center');
            });
        </script>
    @endpush
@endsection

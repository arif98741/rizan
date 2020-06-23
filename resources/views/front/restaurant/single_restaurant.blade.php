@extends('layout.front.front')
@section('title', $restaurant->name)
@section('content')

    <!-- hero start -->
    <section class="hero-single-res"
             style="background: url({{ asset('storage/uploads/restaurant/cover/'.$restaurant->cover_photo) }}) no-repeat center center; background-size: cover">
        <div class="map-img">
            <iframe width="100%" height="100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14540.96353152015!2d89.91391352164221!3d24.338100355210525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fdf0ab1f8701c3%3A0x6b2bb0826051b98f!2sElenga%20Resort%20Ltd!5e0!3m2!1sen!2sbd!4v1592770308610!5m2!1sen!2sbd"
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
                        <a href="http://{{ $restaurant->facebook }}" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        </i>
                    </li>
                    <li>
                        <a href="http://{{ $restaurant->instagram }}" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        </i>
                    </li>
                    <li>
                        <a href="http://{{ $restaurant->website }}" target="_blank">
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
                                     src="{{ asset('storage/uploads/food/thumbnail/'.$food->feature_photo)}}"
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
    <!-- menu end -->

    <!-- submit review start -->
    <section class="submit-review-single-res">
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
                        <textarea class="form-control" rows="5"
                                  placeholder="Your comment about this restaurant"></textarea>
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
    <section class="review-rating-read">
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

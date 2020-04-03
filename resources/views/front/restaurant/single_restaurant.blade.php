@extends('layout.front.front')
@section('title','Restaurants')
@section('content')
    <!-- hero start -->
    <section class="hero-single-res">
        <div class="map-img">
            <iframe width="100%" height="100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.9356293358255!2d91.17984521449684!3d23.46278630562037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37547f2f94cda307%3A0x3bc945b2223044a6!2sBangla%20Restora!5e0!3m2!1sen!2sbd!4v1584889355342!5m2!1sen!2sbd"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

            </iframe>
        </div>
    </section>
    <!-- hero end -->

    <!-- restaurant info. start -->
    <div class="res-info-container">
        <div class="res-info">
            <h5 class="res-name">Grandiose Restaurant</h5>
            <span class="res-type">Coffe Shop and Burger house</span>
            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                <span>Dhanmondi</span>
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
                        <a href="#">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        </i>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        </i>
                    </li>
                    <li>
                        <a href="#">
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
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img1.png')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
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
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-2.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
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
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img1.png')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
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
                </div>

                <div class="row">
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-2.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
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
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img1.png')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
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
                    <div class="col-sm-4 item-each">
                        <a href="./single-food.html">
                            <img class="img-fluid" src="{{ asset('asset/front/img/food-img-2.jpg')}}" alt="">
                            <div class="title">
                                <h5 class="name">Sushi with salad</h5>
                                <p class="price">BDT 290</p>
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
                </div>

            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#">Page</a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
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

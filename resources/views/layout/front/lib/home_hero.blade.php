<section class="hero-home">
<?php
$site = \Illuminate\Support\Facades\Cache::get('site_details');

?>
<!-- Search Section start -->


    <div class="hero-container">
        <h1>Find your nearby<br>restaurant or food<br>with best offer !</h1>
        <div class="search-box">
            <form action="{{ url('search') }}">

                <input id="placeholder-text-change" type="text" name="key" id=""
                       placeholder="Search foods11, restaurants or places" autofocus>
                <input type="hidden" name="sort" value="asc">
                <button type="submit">Search here</button>
            </form>
        </div>
    </div>
    <!-- Search Section end -->
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
                    <i class="fab fa-twitter"></i>
                </a>
                </i>
            </li>
            <li>
                <a href="#}">
                    <i class="fab fa-instagram"></i>
                </a>
                </i>
            </li>
        </ul>
    </div>
</section>



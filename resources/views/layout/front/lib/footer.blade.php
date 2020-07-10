<?php
$site = \Illuminate\Support\Facades\Cache::get('site_details');

?>
<section class="footer">
    <div class="footer-container">
        <div class="row">
            <div class="col-sm-4 footer-each">
                <h5>Know Us</h5>
                <ul class="un-list">
                    <li class=""><a href="{{ url('page/about-us') }}">About Us</a></li>
                    <li class=""><a href="{{ url('page/terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li class=""><a href="{{ url('/team-members') }}">Team Members</a></li>
                </ul>
            </div>
            <div class="col-sm-4 footer-each">
                <h5>Contact Us</h5>
                <ul class="un-list">
                    <li class=""> Phone: {{ $site->contact }}</li>
                    <li class=""> Email: {{ $site->email }}</li>
                </ul>
            </div>
            <div class="col-sm-4 footer-each">
                <h5>For Restaurant Owner</h5>
                <ul class="un-list">
                    <li class=""><a href="{{ url('restaurant') }}">My Account</a></li>
                    <li class=""><a href="#">Get New Account</a></li>
                </ul>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6">
                <div class="social-icon">
                    <a href=""> <i class="fab fa-facebook-square"></i> </a>
                    <a href=""> <i class="fab fa-twitter"></i> </a>
                    <a href=""> <i class="fab fa-instagram"></i> </a>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <p>&copy; {{ date('Y') }} Foods-Khujun, All rights Reserved</p>
            </div>
        </div>

    </div>
</section>

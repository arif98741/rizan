<?php
$site = \Illuminate\Support\Facades\Cache::get('site_details');

?>
<section class="footer">
    <div class="footer-container">
        <div class="row">
            <div class="col-sm-4 footer-each">
                <h5>Know Us</h5>
                <ul class="un-list">
                    <li class=""><a href="{{ url('about-us') }}">About Us</a></li>
                    <li class=""><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                    <li class=""><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
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
                    <li class=""><a href="{{ url('new-account') }}">Get New Account</a></li>
                </ul>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6">
                <div class="social-icon">
                    <a href="https://{{ $site->facebook }}" target="_blank"> <i class="fab fa-facebook-square"></i> </a>
                    <a href="https://{{ $site->twitter }}" target="_blank"> <i class="fab fa-twitter"></i> </a>
                    <a href="https://{{ $site->instagram }}" target="_blank"> <i class="fab fa-instagram"></i> </a>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <p>&copy; {{ date('Y') }} TreatLover, All rights Reserved | v1.2.6 | <span><i>Developed by: <a
                                href="https://facebook.com/arifulislammmc007"
                                target="_blank">Ariful Islam</a> </i></span></p>
            </div>
        </div>
    </div>
</section>

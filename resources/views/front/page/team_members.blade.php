@extends('layout.front.front')
@section('title','Restaurants')
@section('content')
    <!-- person start -->
    <section class="person-team">
        <div class="person-full">
            <h2 class="heading">Meet Our Team Members</h2>
            <div class="person-container">

                <div class="row">
                    @foreach($team_members as $team_member)
                        <div class="col-sm-4">
                            <div class="item-each">
                                <img class="img-fluid"
                                     src="{{ asset('storage/uploads/team_member/feature/'.$team_member->feature_photo) }}"
                                     alt="{{ $team_member->name.' - '.url('/') }}">
                                <div class="title">
                                    <h5 class="name">{{ $team_member->name }}</h5>
                                    <p class="desg">{{ $team_member->designation }}</p>
                                    <div class="social-icon">
                                        <a href="{{ $team_member->facebook }}">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="{{ $team_member->instagram }}">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="{{ $team_member->twitter }}">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>
        </div>
    </section>


@endsection

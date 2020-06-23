@extends('layout.front.front')
@section('title','Restaurants')
@section('content')
    <!-- about us start -->
    <section class="about-us">
        <div class="about-us-container">
            <h2 class="heading">{{ $page->page_title }}</h2>
            <p>
                {{ $page->description }}
            </p>
        </div>
    </section>
    <!-- about us end -->

    <!-- objective start -->
    @if($page->slug == 'about-us')

        <section class="objective">
            <div class="objective-container">
                <h2 class="heading">Objective</h2>
                <ul>
                    {{ $page->object_description }}
                </ul>
            </div>
        </section>
    @endif
    <!-- objective end -->


@endsection

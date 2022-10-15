@extends('layouts.app')
@section('content')
    @include('layouts.menubar')
    <!-- Home -->
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-speed="0.8">
            <img style="width: 100%; height:100%"src="{{ asset($post->post_image) }}" alt="">
        </div>
    </div>

    <!-- Single Blog Post -->

    <div class="single_post">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="single_post_title">
                        @if (Session::get('lang') == 'hindi')
                            {{ $post->post_title_in }}
                        @else
                            {{ $post->post_title_en }}
                        @endif
                    </div>
                    <div class="single_post_text">
                        <p>
                            @if (Session::get('lang') == 'hindi')
                                {!! $post->details_in !!}
                            @else
                                {!! $post->details_en !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title', 'Event Booking - Home')
@section('content')
<div class="container mt-5">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <p class="h3">Upcoming Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['comming'] as $commingEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">Title</div>
                        <div>When</div>
                        <small class="text-muted">Where</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="h3">Pending Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['pending'] as $commingEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">Title</div>
                        <div>When</div>
                        <small class="text-muted">Where</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="h3">Missed Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['missed'] as $commingEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">Title</div>
                        <div>When</div>
                        <small class="text-muted">Where</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="h3">Recent Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['recent'] as $commingEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">Title</div>
                        <div>When</div>
                        <small class="text-muted">Where</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('slick/slick.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') . '?r=' . rand()  }}" />
@endsection
@section('scripts')
    <script src="{{ asset('slick/slick.min.js') . '?r=' . rand() }}"></script>
    <script>
        $('.events').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }   
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: "unslick"
                }
            ]
        });
    </script>
@endsection

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
                        <div data-id="{{ $commingEvent->event->id }}" class="text-value" style="cursor: pointer">{{ $commingEvent->event->name }}</div>
                        <div>
                            @if (\Carbon\Carbon::parse($commingEvent->event->start_dt)->isToday())
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->format('h:i A') }}
                            @else
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->toDayDateTimeString() }}
                            @endif
                        </div>
                        <small class="text-muted">{{ $commingEvent->event->location }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="h3">Pending Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['pending'] as $pendingEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">{{ $commingEvent->event->name }}</div>
                        <div>
                            @if (\Carbon\Carbon::parse($commingEvent->event->start_dt)->isToday())
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->format('h:i A') }}
                            @else
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->toDayDateTimeString() }}
                            @endif
                        </div>
                        <small class="text-muted">{{ $commingEvent->event->location }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="h3">Missed Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['missed'] as $missedEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">{{ $commingEvent->event->name }}</div>
                        <div>
                            @if (\Carbon\Carbon::parse($commingEvent->event->start_dt)->isToday())
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->format('h:i A') }}
                            @else
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->toDayDateTimeString() }}
                            @endif
                        </div>
                        <small class="text-muted">{{ $commingEvent->event->location }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p class="h3">Recent Events</p>
    <hr />
    <div class="events">
        @foreach ($filteredEvents['recent'] as $recentEvent)
            <div class="mx-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-value">{{ $commingEvent->event->name }}</div>
                        <div>
                            @if (\Carbon\Carbon::parse($commingEvent->event->start_dt)->isToday())
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->format('h:i A') }}
                            @else
                                {{ \Carbon\Carbon::parse($commingEvent->event->start_dt)->toDayDateTimeString() }}
                            @endif
                        </div>
                        <small class="text-muted">{{ $commingEvent->event->location }}</small>
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

        $('.text-value').click(function() {
            const eventID = $(this).data("id");
            window.location.href = `/event/${eventID}`;
        });
    </script>
@endsection

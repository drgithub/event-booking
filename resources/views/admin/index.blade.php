@extends('admin::layouts.app')
@section('title', 'Dashboard')
@section('title2', 'Dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 col-sm-6">
            <div class="card">
                <div class="card-body events">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="icon-calendar"></i>
                    </div>
                    <div class="text-value">{{ $event->count() }}</div>
                    <small class="text-muted text-uppercase font-weight-bold">Events</small>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scritps')
    <script>
        $('.events').click(() => {
            location.href = "/admin/events";
        });
    </script>
@endsection
@extends('admin::layouts.app')
@section('title', 'Event Booking - Events')
@section('title2', 'Events')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('events.index') }}">Events</a></li>
@endsection
@section('content')
    <div class="card card-accent-primary">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('events.create') }}">
                <i class="fa fa-plus"></i> Create Event
            </a>
        </div>
        <div class="card-body">
            <table id="list" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Guests</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap4.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap4-dialog/css/bootstrap-dialog.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('datetime-picker/css/bootstrap-datetimepicker.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('css/event-index.css') . '?r=' . rand()  }}" />
@endsection
@section('scritps')
    <script src="{{ asset('datatables/jquery.dataTables.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('bootstrap4-dialog/js/bootstrap-dialog.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('datetime-picker/js/bootstrap-datetimepicker.min.js') . '?r=' . rand() }}"></script>
    <script>
        $('.eventCreate').on('click', function() {
            formModal($(this));
        });

        $('#list').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/admin/list/events",
                "data": function (d, settings) {
                    var api = new $.fn.dataTable.Api(settings);

                    // Convert starting record into page number
                    d.page = (Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    )+1);
                }
            },
            "columns": [
                { "data": "name" },
                { "data": "date" },
                { "data": "location" },
                { "data": "guests" },
                { "data": "actions" }
            ],
            'columnDefs': [{
                'targets': [4],
                'orderable': false,
                'className': 'actions',
            }]
        });
    </script>
@endsection
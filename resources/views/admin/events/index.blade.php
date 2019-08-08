@extends('admin::layouts.app')
@section('title', 'Event Booking - Event')
@section('title2', 'Event')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('events.index') }}">Event</a></li>
@endsection
@section('content')
    <div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-labelledby="viewEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-bold" id="viewEventModalLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control name" id="name" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control location" id="location" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control description" id="description" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start_date" class="col-sm-2 col-form-label">Start</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control start-date" id="start_date" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end_date" class="col-sm-2 col-form-label">End</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control event-date" id="end_date" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end_date" class="col-sm-2 col-form-label">Guests</label>
                        <div class="col-sm-10 taginput-field">
                            <input type="text" class="form-control guests"readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-success edit-event" style="width: 60px">Edit</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 60px">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-accent-primary">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('events.create') }}">
                <i class="fa fa-plus"></i> Create Event
            </a>
        </div>
        <div class="card-body">
            <table id="list" class="display nowrap table table-striped table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Guests</th>
                        <th>Going</th>
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
    <script src="{{ asset('bootstrap4-tagsinput/tagsinput.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('bootstrap4-dialog/js/bootstrap-dialog.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('datetime-picker/js/bootstrap-datetimepicker.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('sweetalert/dist/sweetalert.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('css-element-queries/src/ResizeSensor.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('css-element-queries/src/ElementQueries.js') . '?r=' . rand() }}"></script>
    <script>
        const table = $('#list').DataTable({
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": `{{ route('list', 'events') }}`,
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
                { "data": "going" },
                { "data": "actions" }
            ],
            'columnDefs': [{
                'targets': [4],
                'orderable': false,
                'className': 'actions',
            }]
        }).columns.adjust();

        $('#list tbody').on( 'click', '.eventDelete', function () {
            let event_id = $(this).attr('data-id');

            swal({
                title: "Are you sure to delete this event?",
                icon: "warning",
                buttons: {
                    confirm: 'Yes, proceed',
                    cancel: 'Cancel'
                },
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: `/admin/events/${event_id}`,
                        type: 'DELETE',
                        success: function() {
                            swal({
                              title: "Deleted Successfully",
                              icon: "success",
                            }).then(() => {
                                location.reload();
                            })
                        }
                    });
                }
            });
        });

        $('#list tbody').on( 'click', '.eventView', function (e) {
            e.preventDefault();
            let eventId = $(this).attr('data-id');

            $.ajax({
                url: `/admin/events/${eventId}`,
                type: 'GET',
                success: function(response) {
                    let eventData = response.event;
                    $('.name').val(eventData.name);
                    $('.location').val(eventData.location);
                    $('.description').val(eventData.description);
                    $('.start-date').val(response.convertedDates.start);
                    $('.event-date').val(response.convertedDates.end);
                    $('.guests').val(response.guests);
                    $('.edit-event').attr('href', `/admin/events/${eventId}/edit`)
                    $("#viewEventModal").modal('show');
                }
            });
        });

        $(".card-accent-primary").resize(function() {
            console.log('resize');
        });

        new ResizeSensor(jQuery('.main'), function(){ 
            table.columns.adjust();
        });
    </script>
@endsection

@extends('admin::layouts.app')
@section('title', 'Events')
@section('title2', 'Events')
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="events">Events</a></li>
@endsection
@section('content')
    <div class="card card-accent-primary">
        <div class="card-header">
            <button id="create-event" data-action="create" class="btn btn-primary" type="button">
                <i class="fa fa-plus"></i> Create Event
            </button>
        </div>
        <div class="card-body">
            <table id="list" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Guests</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><a class="event_name" data-id="{{ $event->id }}" data-action="show" href="#">{{ $event->name }}</a></td>
                            <td>{{ $event->start_dt }} ~ {{ $event->end_dt }}</td>
                            <td>{{ $event->location }}</td>
                            <td>61</td>
                            <td>
                                <button id="edit-event" data-id="{{ $event->id }}" data-action="edit" class="btn btn-success btn-sm" type="button">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm" type="button">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/datatable.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('storage/bootstrap4-dialog/css/bootstrap-dialog.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('storage/datetime-picker/css/bootstrap-datetimepicker.min.css') . '?r=' . rand()  }}" />
@endsection
@section('scripts')
    <script src="{{ asset('/js/datatable.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('storage/bootstrap4-dialog/js/bootstrap-dialog.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('storage/datetime-picker/js/bootstrap-datetimepicker.min.js') . '?r=' . rand() }}"></script>
    <script>
        var formDialog;

        $(document).ready(function() {
            $('#list').DataTable({
                'columnDefs': [ {
                    'targets': [4],
                    'orderable': false,
                }]
            });

            $('#create-event, .event_name, #edit-event').click(function(e) {
                e.preventDefault();
                formDialog = new BootstrapDialog();
                
                if ($(this).data('action') == "create") {
                    formDialog.setMessage($('<div></div>').load('events/create'));
                }
                if ($(this).data('action') == "show") {
                    formDialog.setMessage($('<div></div>').load('events/'+$(this).data("id")));
                }
                if ($(this).data('action') == "edit") {
                    formDialog.setMessage($('<div></div>').load('events/'+$(this).data("id")+'/edit'));
                }
                
                formDialog.setSize(BootstrapDialog.SIZE_WIDE);
                formDialog.setCloseByBackdrop(false);
                formDialog.realize();
                formDialog.getModalHeader().hide();
                formDialog.getModalBody().css('padding', '0px');
                formDialog.open();
            });
        });
    </script>
@endsection
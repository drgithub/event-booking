@extends('admin::layouts.app')
@section('title', 'Event Booking - Create Event')
@section('title2', 'Create Event')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Event</a></li>
    <li class="breadcrumb-item"><a href="{{ route('events.create') }}">Create Event</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form id="eventForm" method="POST">
                @csrf
                <div class="card card-accent-primary">
                    <div class="card-header actions">
                        <button id="eventSave" class="btn btn-primary" type="submit">Save</button>
                        <button id="eventClear" class="btn btn-secondary" type="button">Clear</button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Event Name</label>
                            <div class="col">
                                <input type="text"  class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Location</label>
                            <div class="col">
                                <input type="text" class="form-control" name="location">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col">
                                <textarea rows="6" class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Start</label>
                            <div class="input-group col">
                                <input type="text" class="form-control date-picker" name="start_dt">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">End</label>
                            <div class="input-group col">
                                <input type="text" class="form-control date-picker" name="end_dt">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Guest</label>
                            <div class="col">
                                <input type="text" class="form-control" id="guest" name="guests_email">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('datetime-picker/css/bootstrap-datetimepicker.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap4-tagsinput/tagsinput.css') . '?r=' . rand()  }}" />
@endsection
@section('custom')
    <link rel="stylesheet" href="{{ asset('css/event-create.css') . '?r=' . rand()  }}" />
@endsection
@section('scritps')
    <script src="{{ asset('datetime-picker/js/bootstrap-datetimepicker.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('bootstrap4-tagsinput/tagsinput.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('jquery-validation/dist/jquery.validate.js') . '?r=' . rand() }}"></script>
    <script>
        $('.date-picker').datetimepicker({
            useCurrent: false,
            showTodayButton: true,
            showClear: true,
            format: 'dddd, MMMM D, YYYY, h:mm A',
            icons: {
                time: "fa fa-clock-o text-primary",
                date: "fa fa-calendar text-primary",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: "fa fa-angle-left",
                next: "fa fa-angle-right",
                today: "fa fa-thumb-tack text-primary",
                clear: "fa fa-trash text-danger"
            }
        });

        $("#guest").tagsinput({
            confirmKeys: [9, 13, 32],
            trimValue: true,
            tagClass: function(item) {
                return (RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/).test(item) ? 'badge-primary' : 'badge-danger');
            }
        });

        var form = $('#eventForm').validate({
            errorClass: "is-invalid",
            rules: {
                name:'required',
                location: 'required',
                description: 'required',
                start_dt: 'required',
                end_dt: 'required'
            },
            errorElement:'em',
            errorPlacement: function(error,element) {
                error.addClass('invalid-feedback');
                element.parent().append(error);
            },
            onkeyup: function(element, event) {
                event.code !== "Tab" && event.code !== "ShiftLeft" && event.code !== "ShiftRight" && $(element).valid();
            },
            submitHandler: function() {
                $('#eventSave').attr('disabled', true);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        name: $('[name=name]').val(),
                        location: $('[name=location]').val(),
                        description: $('#description').val(),
                        start_dt: moment($('[name=start_dt]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end_dt: moment($('[name=end_dt]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        guests_email: $('[name=guests_email]').val()
                    },
                    url: "{{ route('events.store') }}",
                    success: function(response) {
                        $('#eventSave').attr('disabled', false);
                        let status = "";

                        if (response.status) {
                            $('#eventForm')[0].reset();
                            $("#guest").tagsinput('removeAll');
                            status = 'success';
                        } else {
                            status = 'danger';
                        }

                        notificationAlert({
                            container: '#eventForm',
                            status: status,
                            message: response.message
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Something went wrong. Please check your internet connection and try again.");
                    }
                })

            }
        });

        $('#eventClear').click(function() {
            form.resetForm();
            $('#eventForm')[0].reset();
            $("#guest").tagsinput('removeAll');
        });
    </script>
@endsection
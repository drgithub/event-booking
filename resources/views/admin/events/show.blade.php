@extends('admin::layouts.app')
@section('content')

<!-- Modal -->
@if ($guest->event != null) 
<div class="modal fade" id="invitationModal" tabindex="-1" role="dialog" aria-labelledby="invitationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="event_data" event-id="{{ $guest->event->id }}" guest-id="{{ $guest->id }}">
        <h5 class="modal-title font-bold" id="invitationModalLabel">{{ $guest->event->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            Description : {{ $guest->event->description }}
        </div>
        <div class="mt-2">
            Location : {{ $guest->event->location }}
        </div>
        <div class="mt-2">
            <div>Start : {{ $guest->event->start_dt }}</div>
        </div>
        <div class="mt-2">
            <div>End : {{ $guest->event->end_dt }}</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary decline" data-dismiss="modal">Decline</button>
        <button type="button" class="btn btn-primary accept">Go</button>
      </div>
    </div>
  </div>
</div>
@else
  <div class="modal fade" id="invitationModal" tabindex="-1" role="dialog" aria-labelledby="invitationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger">
            <h3>Event is no longer Available!</h3>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endif
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
    <script src="{{ asset('sweetalert/dist/sweetalert.min.js') . '?r=' . rand() }}"></script>
    <script>

        $('#invitationModal').modal('show');

        $('#invitationModal').on('hidden.bs.modal', function () {
            location.href = "/admin/events";
        });

        $('.decline').click(() => {
          swal({
            title: "Ohhh. Click the invitation link in your email if you change your mind.",
            icon: "info",
          }).then(() => {
            location.href = "/admin/events";
          });
        });

        $('.accept').click(() => {
          let event_id = $('#event_data').attr('event-id');
          let guest_id = $('#event_data').attr('guest-id');
          let token = $('meta[name=csrf-token]').attr('content');

          $.ajax({
            url: '/event/acceptInvitation',
            type: 'POST',
            data: {
              _token: token,
              event_id: event_id,
              guest_id: guest_id,
            },
            success: ((response) => {
              swal({
                title: response.message,
                icon: "success",
              }).then(() => {
                location.href = "/admin/events";
              });
            })
          });
        });
    </script>
@endsection
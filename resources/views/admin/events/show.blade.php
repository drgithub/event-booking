@extends('admin::layouts.app')
@section('content')

<!-- Modal -->
<div class="modal fade" id="invitationModal" tabindex="-1" role="dialog" aria-labelledby="invitationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="event_data" event-id="{{ $guest->event->id }}" guest-id="{{ $guest->id }}">
        <h5 class="modal-title" id="invitationModalLabel">{{ $guest->event->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            {{ $guest->event->description }}
        </div>
        <div>
            Participants
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary decline" data-dismiss="modal">Decline</button>
        <button type="button" class="btn btn-primary accept">Accept</button>
      </div>
    </div>
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
        $('#invitationModal').modal('show');

        $('.decline').click(() => {
            alert('qwe');
        });

        $('.accept').click(() => {
          let event_id = $('#event_data').attr('event-id');
          let guest_id = $('#event_data').attr('guest-id');
          let token = $('meta[name=csrf-token]').val();
          console.log(token);
          $.ajax({
            url: '/event/acceptInvitation',
            type: 'POST',
            data: {
              _token: token,
              event_id: event_id,
              guest_id: guest_id,
            },
            success: ((response) => {
              console.log(response);
            })
          });
        });
    </script>
@endsection
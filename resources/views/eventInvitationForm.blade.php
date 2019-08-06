<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Invitation Form</title>
    <!-- Icons-->
    <link rel="stylesheet" href="{{ asset('coreui-icons/css/coreui-icons.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('flag-icon-css/css/flag-icon.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('simple-line-icons/css/simple-line-icons.css') . '?r=' . rand()  }}" />
    <!-- Main styles for this application-->
    <link rel="stylesheet" href="{{ asset('CoreUI/src/css/style.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('CoreUI/src/vendors/pace-progress/css/pace.min.css') . '?r=' . rand()  }}" />

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-accent-primary">
            <input class="details" type="hidden" email="{{ $guest->email }}" event-id="{{ $guest->event->id }}">
            <div class="card-header">You have been invited to the following event.</div>
            <div class="card-body">
              <h4>{{ $guest->event->name }}</h4>
                <span>{{ $guest->event->description }}</span>
              <br />
              <br />
              <table>
                <tr>
                  <td style="color: #888">When</td>
                  <td style="padding-left: 20px">{{ renderDate($guest->event->start_dt, 'l, F d, Y h:i A') . '' . renderDate($guest->event->end_dt, 'l, F d, Y h:i A')}}</td>
                </tr>
                <tr>
                  <td style="color: #888">Where</td>
                  <td style="padding-left: 20px">{{ $guest->event->location }}</td>
                </tr>
                <tr>
                  <td style="color: #888">Who</td>
                  <td style="padding-left: 20px">eventbookingrd22@gmail.com</td>
                </tr>
                <tr>
                  <td style="color: #888">Going?</td>
                  <td class="going" style="padding-left: 20px">{{ $guest->status == 1 ? 'Yes' : ($guest->status == 2 ? 'Maybe' : ($guest->status == 3 ? 'No' : ''))}}</td>
                </tr>
              </table>
              <br/>
              <div class="response-buttons">
                <button class="event-response btn {{ $guest->status == 1 ? 'btn-success' : 'btn-outline-secondary' }}" response="1" style="width: 80px">Yes</button>
                <button class="event-response btn {{ $guest->status == 2 ? 'btn-secondary' : 'btn-outline-secondary' }}" response="2" style="width: 80px">Maybe</button>
                <button class="event-response btn {{ $guest->status == 3 ? 'btn-danger' : 'btn-outline-secondary' }}" response="3" style="width: 80px">No</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/jquery-3.4.1.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/popper.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/moment.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('bootstrap-4.3.1/dist/js/bootstrap.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/pace.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('perfect-scrollbar/dist/perfect-scrollbar.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/coreui.min.js') . '?r=' . rand() }}"></script>
    <script>
      let currentURL = window.location.href;
      let event_id = $('.details').attr('event-id');
      let email = $('.details').attr('email');
      let formToken = $('meta[name=csrf-token]').attr('content');

      $('.response-buttons').on('click', '.event-response', function() {
        let triggerElement = $(this);
        let revoke = false;
        let option = triggerElement.attr('response');
        let activeButtons = [
          'btn-success',
          'btn-secondary',
          'btn-danger',
        ];

        if (triggerElement.hasClass('btn-success') || triggerElement.hasClass('btn-danger') || triggerElement.hasClass('btn-secondary')) {
          revoke = true;
        }

        $.ajax({
          url: '/invitation-response',
          method: 'POST',
          data: {
            _token: formToken,
            event_id: event_id,
            guest_email: email,
            event_response: revoke ? 0 : $(this).attr('response'),
          },
          success: async function() {
            await $('.event-response').each(function() {
              $(this).removeClass('btn-success btn-danger btn-secondary');

              if (!$(this).hasClass('btn-outline-secondary')) {
                $(this).addClass('btn-outline-secondary');
              }
            });

            if (revoke) {
              $('.going').html('');
            } else {
              $('.going').html(triggerElement.html());
              triggerElement.addClass(activeButtons[option - 1]).removeClass('btn-outline-secondary');
            }
          }
        })
      });
    </script>
  </body>
</html>

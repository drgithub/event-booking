<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Invitation Form</title>
    <!-- Main styles for this application-->
    <link rel="stylesheet" href="{{ asset('CoreUI/src/css/style.css') . '?r=' . rand()  }}" />
    <link rel="stylesheet" href="{{ asset('CoreUI/src/vendors/pace-progress/css/pace.min.css') . '?r=' . rand()  }}" />
    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') . '?r=' . rand()  }}" />
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div id="invitation-container" class="card card-accent-primary" style="position:relative">
            <div class="card-header">You have been invited to the following event.</div>
            <div class="card-body">
              <h4>{{ $data->event->name }}</h4>
              <span>{{ $data->event->description }}</span>
              <br />
              <br />
              <table>
                <tr>
                  <td style="color: #888">When</td>
                  <td style="padding-left: 20px">{{ renderDate($data->event->start_dt, 'l, F d, Y h:i A') . ' - ' . renderDate($data->event->end_dt, 'l, F d, Y h:i A')}}</td>
                </tr>
                <tr>
                  <td style="color: #888">Where</td>
                  <td style="padding-left: 20px">{{ $data->event->location }}</td>
                </tr>
                <tr>
                  <td style="color: #888">Who</td>
                  <td style="padding-left: 20px">eventbookingrd22@gmail.com</td>
                </tr>
                <tr>
                  <td style="color: #888">Going?</td>
                  <td class="going" style="padding-left: 20px">{{ $data->status == 1 ? 'Yes' : ($data->status == 2 ? 'Maybe' : ($data->status == 3 ? 'No' : ''))}}</td>
                </tr>
              </table>
              <br/>
              <div class="response-buttons">
                <button 
                  class="event-response btn {{ $data->status == 1 ? 'btn-success' : 'btn-outline-secondary' }}" 
                  value="1" 
                  style="width: 80px"
                >
                  Yes
                </button>
                <button 
                  class="event-response btn {{ $data->status == 2 ? 'btn-secondary' : 'btn-outline-secondary' }}" 
                  value="2" 
                  style="width: 80px"
                >
                  Maybe
                </button>
                <button 
                  class="event-response btn {{ $data->status == 3 ? 'btn-danger' : 'btn-outline-secondary' }}" 
                  value="3" 
                  style="width: 80px"
                >
                  No
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/jquery-3.4.1.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('bootstrap-4.3.1/dist/js/bootstrap.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/pace.min.js') . '?r=' . rand() }}"></script>
    <script src="{{ asset('js/coreui.min.js') . '?r=' . rand() }}"></script>
    <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      const btnClasses = {
        1: {
          text: 'Yes',
          className: 'btn-success'
        },
        2: {
          text: 'Maybe',
          className:'btn-secondary'
        },
        3: {
          text: 'No',
          className: 'btn-danger'
        }
      }

      $('.response-buttons').on('click', '.event-response', function() {
        const that = this;
        loader('#invitation-container');

        $.ajax({
          url: `{{route('event.response')}}${window.location.search}`,
          method: 'POST',
          data: {
            response: $(that).val(),
          },
          success: function(res) {
            loader('#invitation-container', false);
            
            if (res.status) {
              $('.event-response').each(function() {
                $(this).removeClass('btn-success btn-danger btn-secondary');

                if (!$(this).hasClass('btn-outline-secondary')) {
                  $(this).addClass('btn-outline-secondary');
                }
              });

              $(that).addClass(`${btnClasses[$(that).val()].className}`).removeClass('btn-outline-secondary');
              $('.going').html(`${btnClasses[$(that).val()].text}`);
            } else {
              alert("Sorry, something went wrong. We are working on it and we'll get it fixed as soon as we can.");
            }
          },
          error: function(e) {
            alert("Something went wrong. Please check your internet connection and try again.");
          }
        });
      });

      function loader(wrapper, display=true) {
        if (!display) {
          $(`${wrapper} > .loader`).fadeOut(300, function() { 
            $(this).remove();
          });
          return;
        }

        $(wrapper).prepend(`
          <div class="loader">
              <img src="{{ asset('img/loader.gif') }}" />
          </div>
        `);
      }
    </script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <div class="card-header">You have been invited to the following event.</div>
            <div class="card-body">
              <h4>[Title here]</h4>
              [Description here]Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
              <br />
              <br />
              <table>
                <tr>
                  <td style="color: #888">When</td>
                  <td style="padding-left: 20px">Sat Aug 10 9am – Sun Aug 11, 2019 6pm</td>
                </tr>
                <tr>
                  <td style="color: #888">Where</td>
                  <td style="padding-left: 20px">Cebu IT Park, Cebu City, Cebu, Philippines</td>
                </tr>
                <tr>
                  <td style="color: #888">Who</td>
                  <td style="padding-left: 20px">eventbookingrd22@gmail.com</td>
                </tr
                <tr>
                  <td style="color: #888">Going?</td>
                  <td style="padding-left: 20px">eventbookingrd22@gmail.com</td>
                </tr>
              </table>
              <br/>
              [Buttons here]
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
  </body>
</html>

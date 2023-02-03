<!doctype html>
<html lang="en">

<head>
    <title>{{$title ?? 'Dashboard'}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="{{ url('assets/template-admin/assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
    <!-- {{-- font awesome --}} -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <style>
        .bg-ungu {
            background-color: #9C27B0;
            padding: 10px;
            color: white;
        }
    </style>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
        @if(auth()->user()->role == 'admin')
        @include('component._sidebar_admin')
        @else
        @include('component._sidebar_user')
        @endif
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0);">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <span class="fas fa-sign-out-alt bg-ungu"> Keluar</span>
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
       <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Yakin Ingin Keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Silahkan pilih "Logout" di bawah untuk mengakhiri sesi saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
            </div>
        </div>
    </div>
    
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

    <!--   Core JS Files   -->
    <script src="{{ url('assets/template-admin/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/template-admin/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/template-admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  
    <!-- Plugin for the Perfect Scrollbar -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  
    <!-- Plugin for the momentJs  -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/moment.min.js') }}"></script>
  
    <!--  Plugin for Sweet Alert -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/sweetalert2.js') }}"></script>
  
    <!-- Forms Validations Plugin -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/jquery.validate.min.js') }}"></script>
  
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  
    <script src="{{ url('assets/template-admin/assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
  
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/jquery.datatables.min.js') }}"></script>
  
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
  
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/fullcalendar.min.js') }}"></script>
  
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/jquery-jvectormap.js') }}"></script>
  
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/nouislider.min.js') }}"></script>
  
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  
    <!-- Library for adding dinamically elements -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/arrive.min.js') }}"></script>
  
    <!-- Chartist JS -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/chartist.min.js') }}"></script>
  
    <!--  Notifications Plugin    -->
    <script src="{{ url('assets/template-admin/assets/js/plugins/bootstrap-notify.js') }}"></script>
  
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('assets/template-admin/assets/js/material-dashboard.min.js?v=2.1.2') }}" type="text/javascript"></script>
    <!-- sweet alert -->
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>  
      <script>
    $(document).ready(function() {


      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
  </script>
  <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '//connect.facebook.net/en_US/fbevents.js');

    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");

    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {
      if ($('.card-header.card-chart').length != 0) {
        md.initDashboardPageCharts();
      }

      if ($('#websiteViewsChart').length != 0) {
        md.initDocumentationCharts();
      }





      if ($('.datetimepicker').length != 0) {
        md.initFormExtendedDatetimepickers();
      }
      if ($('#fullCalendar').length != 0) {
        md.initFullCalendar();
      }

      if ($('.slider').length != 0) {
        md.initSliders();
      }

      //  Activate the tooltips
      $('[data-toggle="tooltip"]').tooltip();

      // Activate Popovers
      $('[data-toggle="popover"]').popover();

      // Vector map
      if ($('#worldMap').length != 0) {
        md.initVectorMap();
      }

      if ($('#RegisterValidation').length != 0) {

        setFormValidation('#RegisterValidation');

        function setFormValidation(id) {
          $(id).validate({
            highlight: function(element) {
              $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
              $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
              $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
              $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
            },
            errorPlacement: function(error, element) {
              $(element).closest('.form-group').append(error);
            },
          });
        }
      }

    });

    // FileInput
    $('.form-file-simple .inputFileVisible').click(function() {
      $(this).siblings('.inputFileHidden').trigger('click');
    });

    $('.form-file-simple .inputFileHidden').change(function() {
      var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
      $(this).siblings('.inputFileVisible').val(filename);
    });

    $('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function() {
      $(this).parent().parent().find('.inputFileHidden').trigger('click');
      $(this).parent().parent().addClass('is-focused');
    });

    $('.form-file-multiple .inputFileHidden').change(function() {
      var names = '';
      for (var i = 0; i < $(this).get(0).files.length; ++i) {
        if (i < $(this).get(0).files.length - 1) {
          names += $(this).get(0).files.item(i).name + ',';
        } else {
          names += $(this).get(0).files.item(i).name;
        }
      }
      $(this).siblings('.input-group').find('.inputFileVisible').val(names);
    });

    $('.form-file-multiple .btn').on('focus', function() {
      $(this).parent().siblings().trigger('focus');
    });

    $('.form-file-multiple .btn').on('focusout', function() {
      $(this).parent().siblings().trigger('focusout');
    });
  </script> 
  @stack('scripts')
</body>

</html>
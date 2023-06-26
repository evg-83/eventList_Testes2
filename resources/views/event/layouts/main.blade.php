<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Events | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Select2 -->
  <link rel="stylesheet"
    href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet"
    href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet"
    href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet"
    href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet"
    href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet"
    href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div
      class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('dist/img/E.jpeg') }}"
        alt="E" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <div class="col-12 d-flex justify-content-between">
        <ul class="navbar-nav">
          <li class="nav-item">
            {{-- <a class="nav-link" data-widget="pushmenu" href="#"
              role="button"><i class="fas fa-bars"></i></a> --}}
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <form action="{{ route('auth.logout') }}" method="post">
              @csrf
              @method('DELETE')
              <input class="btn btn-outline-primary" type="submit"
                value="Выйти">
            </form>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    @yield('content')

  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
  </script>
  <!-- Select2 -->
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}">
  </script>
  <!-- bs-custom-file-input -->
  <script
    src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}">
  </script>
  <!-- overlayScrollbars -->
  <script
    src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
  </script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>
  <script>
    //обновление страницы
    // setInterval(function() {
    //   $("#events").ready(function() {
    //         location.reload();
    //       });
    // }, 30000);

    //обновление блока
    (async function() {
      var selector = '#events'; // Селектор блока, который надо обновлять

      while (true) {
        await new Promise(function(s) {
          setTimeout(s, 30 * 1000);
        }); // Каждые 30 сек.

        try {
          var html = await (await fetch(location.href)).text();
          var newdoc = new DOMParser().parseFromString(html, 'text/html');
          document.querySelector(selector).outerHTML = newdoc.querySelector(
            selector).outerHTML;
          console.log('Элемент ' + selector + ' был успешно обновлен');
        } catch (err) {
          console.error('При обновлении элемента ' + selector +
            ' произошла ошибка:', err);
        }
      }
    })();

    (async function() {
      var selector = '#usersParty'; // Селектор блока, который надо обновлять

      while (true) {
        await new Promise(function(s) {
          setTimeout(s, 30 * 1000);
        }); // Каждые 30 сек.

        try {
          var html = await (await fetch(location.href)).text();
          var newdoc = new DOMParser().parseFromString(html, 'text/html');
          document.querySelector(selector).outerHTML = newdoc.querySelector(
            selector).outerHTML;
          console.log('Элемент ' + selector + ' был успешно обновлен');
        } catch (err) {
          console.error('При обновлении элемента ' + selector +
            ' произошла ошибка:', err);
        }
      }
    })();

    // $(document).ready(function() {
    //   $('#summernote').summernote({
    //     toolbar: [
    //       // [groupName, [list of button]]
    //       ['style', ['bold', 'italic', 'underline', 'clear']],
    //       ['font', ['strikethrough', 'superscript', 'subscript']],
    //       ['fontsize', ['fontsize']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']],
    //       ['height', ['height']]
    //     ]
    //   });
    // });
    $(function() {
      bsCustomFileInput.init();
    });
    //Инициализировать элементы Select2
    $('.select2').select2()
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
  </script>

  <style>
    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "...";
    }
  </style>
</body>

</html>

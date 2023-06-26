<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
    crossorigin="anonymous">
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('auth.register') }}">Регистрация</a>
      </li>
      <li class="breadcrumb-item active">Авторизация</li>
    </ol>
  </div><!-- /.col -->

  <div class="row justify-content-center mt-5">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">Авторизация</h1>
        </div>
        <div class="card-body">
          @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
              {{ Session::get('error') }}
            </div>
          @endif
          <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="login" class="form-label">Логин</label>
              <input type="text" name="login" class="form-control"
                id="login" placeholder="Логин" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Пароль</label>
              <input type="password" name="password" class="form-control"
                id="password" required>
            </div>
            <div class="mb-3">
              <div class="d-grid">
                <button class="btn btn-primary">Авторизоваться</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

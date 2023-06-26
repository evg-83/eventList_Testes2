<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Page</title>
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
          <li class="breadcrumb-item"><a href="{{ route('auth.login') }}">Авторизация</a>
          </li>
          <li class="breadcrumb-item active">Регистрация</li>
        </ol>
      </div><!-- /.col -->

  <div class="row justify-content-center mt-5">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">Регистрация</h1>
        </div>
        <div class="card-body">
          @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('success') }}
            </div>
          @endif
          <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="login" class="form-label">Логин</label>
              <input type="text" name="login" class="form-control"
                id="login" placeholder="Логин пользователя" required>
            </div>
            {{-- <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control"
                id="email" placeholder="name@example.com" required>
            </div> --}}
            <div class="mb-3">
              <label for="password" class="form-label">Пароль</label>
              <input type="password" name="password" class="form-control"
                id="password" required>
            </div>
            <div class="mb-3">
              <label for="first_name" class="form-label">Имя</label>
              <input type="text" name="first_name" class="form-control"
                id="first_name" required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Фамилия</label>
              <input type="text" name="last_name" class="form-control"
                id="last_name" required>
            </div>
            <div class="mb-3">
              <label for="date_of_birth" class="form-label">Дата рождения</label>
              <input type="text" name="date_of_birth" class="form-control"
                id="date_of_birth">
            </div>
            <div class="mb-3">
              <div class="d-grid">
                <button class="btn btn-primary">Регистрация</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

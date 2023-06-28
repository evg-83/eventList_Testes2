@extends('event.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{ $userLog->pluck('first_name')->first() }}</h1>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('admin.index') }}">Админ</a></li>
              <li class="breadcrumb-item"><a
                  href="{{ route('event.showEvent', $usersParty->event_id) }}">Событие
                  пользователя</a>
              </li>
              <li class="breadcrumb-item active">
                {{ $userLog->pluck('first_name')->first() }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $userLog->pluck('id')->first() }}</td>
                    </tr>
                    <tr>
                      <td>Логин</td>
                      <td>{{ $userLog->pluck('login')->first() }}</td>
                    </tr>
                    <tr>
                      <td>Имя</td>
                      <td>{{ $userLog->pluck('first_name')->first() }}</td>
                    </tr>
                    <tr>
                      <td>Фамилия</td>
                      <td>{{ $userLog->pluck('last_name')->first() }}</td>
                    </tr>
                    <tr>
                      <td>Дата рождения</td>
                      <td>{{ $userLog->pluck('date_of_birth')->first() }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

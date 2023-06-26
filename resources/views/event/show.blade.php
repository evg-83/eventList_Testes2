@extends('event.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{ $user->first_name }}</h1>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('event.index', $user->id) }}">Главная</a></li>
              <li class="breadcrumb-item"><a
                  href="{{ route('admin.index') }}">Админ</a></li>
              <li class="breadcrumb-item active">{{ $user->first_name }}</li>
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
                      <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                      <td>Логин</td>
                      <td>{{ $user->login }}</td>
                    </tr>
                    <tr>
                      <td>Имя</td>
                      <td>{{ $user->first_name }}</td>
                    </tr>
                    <tr>
                      <td>Фамилия</td>
                      <td>{{ $user->last_name }}</td>
                    </tr>
                    <tr>
                      <td>Название события</td>
                      @foreach ($events as $event)
                        <td>{{ $event->title }}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <td>Описание события</td>
                      @foreach ($events as $event)
                        <td>{{ $event->content }}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <td>Участники события</td>
                      @foreach ($usersParty as $userParty)
                        <td>
                          {{ $userParty->name }}
                        </td>
                      @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

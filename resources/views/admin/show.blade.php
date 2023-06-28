@extends('admin.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{ $user->first_name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('event.event') }}">События</a>
              </li>
              <li class="breadcrumb-item"><a
                  href="{{ route('admin.index') }}">Пользователи</a></li>
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
                      <td>Дата рождения</td>
                      <td>{{ $user->date_of_birth }}</td>
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
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div>
      <ul class="pt-3 nav nav-pills nav-sidebar flex-column"
        data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item mb-5 pl-5">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $user->first_name }}</h1>
          </div>
        </li>

        <li class="nav-item">
          <div class="nav-link">
            <i class="nav-icon fas fa-solid fa-user"></i>
            <p>
              События
            </p>
          </div>
          <div class="card-body table-responsive p-0" style="height: 400px;">
            <table class="table table-head-fixed text-nowrap">
              <tbody>
                @foreach ($events as $event)
                  <tr>
                    <td class="pl-5">
                      <a href="{{ route('event.showEvent', $event->id) }}"
                        class="nav-link">
                        {{ $event->title }}
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection

@extends('admin.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователи</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('event.event') }}">События</a></li>
              <li class="breadcrumb-item active">Админ</li>
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
          <div class="col-1.5 mb-3">
            {{-- <a href="{{ route('admin.create') }}"
              class="btn btn-block btn-primary">Добавить</a> --}}
          </div>
        </div>
        <div class="row">
          <div class="col-10">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Логин</th>
                      <th>Имя</th>
                      <th>Фамилия</th>
                      <th>Дата рождения</th>
                      <th colspan="3" class="text-center">Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->date_of_birth }}</td>
                        <td class="text-center"><a
                            href="{{ route('admin.show', $user->id) }}"><i
                              class="far fa-regular fa-eye"></i></a></td>
                        <td class="text-center">
                          <form action="{{ route('admin.delete', $user->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                              class="border-0 bg-transparent">
                              <i class="fas fa-trash text-danger"
                                role="button"></i></a>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
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
            <h1 class="m-0">{{ $userAuth->first_name }}</h1>
          </div>
        </li>

        <div id="events">
          <li class="nav-item">
            <div class="nav-link">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Все события
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
        </div>
      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection

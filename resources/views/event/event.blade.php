@extends('event.layouts.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a
                  href="{{ route('admin.index') }}">Админ</a></li>
              <li class="breadcrumb-item active">Пользователи</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-sm-6 mb-3">
          <h1 class="m-0">Создайте событие</h1>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <form action="{{ route('event.store') }}" method="POST"
              class="">
              @csrf
              <div class="form-group w-25">
                <input type="text" class="form-control" name="title"
                  placeholder="Заголовок события" required>
              </div>
              <div class="form-group">
                <textarea class="w-25" id="" name="content" required>{{ old('content') }}</textarea>
              </div>
              <input type="submit" class="btn btn-primary" value="Добавить">
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->

      <!-- Sidebar -->
      <div>
        <ul class="pt-2 nav nav-pills nav-sidebar flex-column"
          data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item mb-5 pl-5">
            <div class="col-sm-6">
              <h1>{{ $userAuth->first_name }}</h1>
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
              <div class="card-body table-responsive p-0" style="height: 200px;">
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

          <li class="nav-item">
            <div class="nav-link">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Мои события
              </p>
            </div>
            <div class="card-body table-responsive p-0" style="height: 200px;">
              <table class="table table-head-fixed text-nowrap">
                <tbody>
                  @foreach ($events as $event)
                    @if ($event->user_id == $userAuth->id)
                      <tr>
                        <td class="pl-5">
                          <a href="{{ route('event.showEvent', $event->id) }}"
                            class="nav-link">
                            {{ $event->title }}
                          </a>
                        </td>
                      </tr>
                    @endif
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

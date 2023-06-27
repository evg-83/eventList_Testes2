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

        <div class="card-body">
          <div class="pl-0">
            <h1 class="m-0">{{ $event->title }}</h1>
          </div>
          <div class="pl-0 mt-3">
            <h3 class="m-0">{{ $event->content }}</h3>
          </div>
          <div class="pl-0 mt-3">
            <h5 class="m-0">{{ $event->created_at }}</h5>
          </div>
        </div>

        <div class="card-body">
          <div class="pl-0 mt-5">
            <h1 class="m-0">Участники</h1>
          </div>
          <div class="pl-0 mt-3" id="usersParty">
            @foreach ($usersParty as $userParty)
              <ul>
                <li>
                  <a href="{{ route('event.show', $userParty->id)}}" class="nav-link">
                    <h5 class="m-0">{{ $userParty->name }}</h5>
                  </a>
                </li>
              </ul>
            @endforeach
          </div>
        </div>


        <div class="pl-0">
          @if ($userAuth->id != $event->user_id)
            <form action="{{ route('event.update', $event->id) }}" method="POST"
              class="w-25">
              @csrf
              <div class="form-group">
                <input type="hidden" name="event_id" value="{{ $event->id }}">
              </div>
              <input type="submit" class="btn btn-outline-primary"
                value="Принять участие">
            </form>
          @endif
        </div>
        <div class="pl-0">
          @if ($userAuth->id == $event->user_id)
            <form action="{{ route('event.deleteUserParty', $event->id) }}"
              method="POST" class="w-25">
              @csrf
              @method('DELETE')
              <div class="form-group">
                <input type="hidden" name="userDeleteParty"
                  value="{{ $event->id }}">
              </div>
              <input type="submit" class="btn btn-outline-primary"
                value="Отказаться от участия">
            </form>
          @endif
        </div>

        <div class="row">
          <div class="col-10">
            <div class="card">

            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
            <table class="table table-sm">
              <tbody>
                @foreach ($events as $event)
                  <tr>
                    <td class="pl-5">
                      <a href="{{ route('event.index', $event->id) }}"
                        class="nav-link">
                        {{ $event->title }}
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </li>
        </div>

        <li class="nav-item">
          <div class="nav-link">
            <i class="nav-icon fas fa-solid fa-user"></i>
            <p>
              Мои события
            </p>
          </div>
          <table class="table table-sm">
            <tbody>
              @foreach ($events as $event)
                @if ($event->user_id == $userAuth->id)
                  <tr>
                    <td class="pl-5">
                      <a href="{{ route('event.index', $event->id) }}"
                        class="nav-link">
                        {{ $event->title }}
                      </a>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </li>
      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection

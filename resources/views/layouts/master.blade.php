<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta charset="UTF-8">
  <meta href="{{ URL::to('/') }}" />
  <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />
  <title>Test PRAVALER</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cube"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PRAVALER</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- Heading -->
      <div class="sidebar-heading">
        Gerenciar
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (request()->is('aluno*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('aluno.index') }}">
          <i class="fas fa-users"></i>
          <span>Alunos</span>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('curso*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('curso.index') }}">
          <i class="fas fa-book-reader"></i>
          <span>Cursos</span>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('instituicao*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('instituicao.index') }}">
          <i class="fas fa-university"></i>
          <span>Instituições</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          @yield('title')
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-none d-sm-block">
              <div class="nav-link ">
                @yield('botao')
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <form class="nav-link" action="{{ route('session.instituicao') }}" method="post">
                @csrf
                <select class="custom-select input-sm" name="id" onchange="this.form.submit()">
                  @foreach(App\Models\Instituicao::all() as $instituicao)
                  <option value="{{$instituicao->id}}" {{ session()->get('instituicao') == $instituicao->id ? 'selected' : '' }}>{{$instituicao->nome}}</option>
                  @endforeach
                </select>
              </form>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Everaldo da Costa Filho</span>
                <img class="img-profile rounded-circle" src="https://s.gravatar.com/avatar/64505d93b19ff2f96af666d73c2bbede?s=80">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($message = Session::get('warning'))
          <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif

          @if ($message = Session::get('info'))
          <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif
          @if (isset($errors) && $errors->any())
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Everaldo da Costa Filho {{ date('Y') }}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>@yield('title') | SIMAPEN</title>
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <!-- chart.js -->
    <script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

    <!-- mystyle -->
    <link href="{{ URL::asset('css/mystyle.css') }}" rel="stylesheet" />

    <link rel="shortcut icon" type="image/jpg" href="{{ URL::asset('images/Picture3 2.png') }}" />
    
  </head>
  <body class="sb-nav-fixed example">
    <!-- NAVBAR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand mb-0 h1" href="/dashboard">SIMAPEN</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <!-- <a class="nav-link" href="#">
            <img src="{{ URL::asset('images/carbon_user-avatar-filled-alt.png') }}" alt="icon" width="30" height="30" />
            {{ucfirst(auth()->user()->name)}} - {{ucfirst(auth()->user()->level)}}
          </a> -->
          <a class="nav-link ms-5" href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt"></i>
            Logout
          </a>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->

    <div id="layoutSidenav" >
      <!-- SIDEBAR -->
      <div id="layoutSidenav_nav"  >
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu example ">
            <div class="nav">
              <div class="bg-dark">
                <img src="{{ URL::asset('images/Vector.png') }}" class="mt-2 ml-1" alt="" width="50" height="50" />
                <i class="fas fa-circle" style="font-size: 10px; color: green"> </i>
                <span class="text-white">{{ucfirst(auth()->user()->name)}} - {{ucfirst(auth()->user()->level)}}</span>
                <div class="input-group mt-3 mb-3">
                  <input type="search" class="form-control btn-outline-secondary ml-2" placeholder="Cari..." aria-label="Search" aria-describedby="search-addon" />
                  <button type="button" class="btn btn-outline-secondary mr-3" style="border-top-left-radius: 0; border-bottom-left-radius: 0"><i class="fas fa-search"></i></button>
                </div>
              </div>
              <div class="sb-sidenav-menu-heading">Menu Navigasi</div>
              <a class="nav-link" href="/dashboard">
                <div class="sb-nav-link-icon ml-3"><i class="fas fa-home"></i></div>
                Dashboard
              </a>
              <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon ml-3"><i class="fas fa-boxes"></i></div>
                Inventaris
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="/alat">Alat</a>
                  <a class="nav-link" href="/bahan">Bahan</a>
                </nav>
              </div>
              <a class="nav-link" href="/menu">
                <div class="sb-nav-link-icon ml-3"><i class="fas fa-cocktail"></i></div>
                Menu
              </a>
              <a class="nav-link" href="/penjualan">
                <div class="sb-nav-link-icon ml-3"><i class="fas fa-calculator"></i></div>
                Penjualan
              </a>
              @if (auth()->user()->level == "owner")
                <a class="nav-link" href="/barista">
                  <div class="sb-nav-link-icon ml-3"><i class="fas fa-user"></i></div>
                  Barista
                </a>
              @endif
            </div>
          </div>
          <div>
            <div class="text-center mb-3">
              <img src="{{ URL::asset('images/Picture3 2.png') }}" class="rounded" alt="logo" width="150px" />
            </div>
          </div>
        </nav>
      </div>
      <!-- END SIDEBAR -->
      <!-- MAINBAR -->
      <div id="layoutSidenav_content">
      @yield('content')
      <!-- END MAINBAR -->
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; Administrasi Coffee Shop 2021</div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('js/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/datatables-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>

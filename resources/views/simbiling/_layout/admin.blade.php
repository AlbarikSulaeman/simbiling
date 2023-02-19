<!DOCTYPE html>
<html>

<head>
  @include('simbiling._layout.header')
  @yield('css')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.js"></script> -->
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/argon/img/brand/logo_wikrama.png')}}"  class="navbar-brand-img" alt="...">
        </a>
      </div>
      @include('simbiling._layout.sidenav')
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('simbiling._layout.navbar')
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          @yield('content')
        </div>
      </div>
      @include('simbiling._layout.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('simbiling._layout.js')
  @yield('js')
</body>

</html>
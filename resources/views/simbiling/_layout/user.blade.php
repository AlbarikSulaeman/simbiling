<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
 @include('simbiling._layout.headeruser')
 @yield('css')
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<body>
  <!-- Sidenav -->
  {{-- <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/argon/img/brand/logo_wikrama.png"  class="navbar-brand-img" alt="...">
        </a>
      </div>
      @include('simbiling._layout.usernav')
    </div>
  </nav> --}}
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('simbiling._layout.navbaruser')
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

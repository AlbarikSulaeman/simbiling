<nav class="navbar navbar-top navbar-expand navbar-dark bg-white border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          <?php
          use App\Models\Notification;
          use Carbon\Carbon;

          $role = Auth::user()->roleSlug;
          $idUser = Auth::user()->_id;
          $notif = Notification::where('reciever', $role)->orWhere('reciever', $idUser)->orderBy('send_at', 'desc')->paginate(5);
          $notifcount = Notification::where('reciever', $role)->count();

          ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-envelope-fill"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              <!-- Dropdown header -->
              <div class="px-3 py-3">
                @if($notifcount > 0)
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{$notifcount}}</strong> notifications.</h6>
                @else
                  <h6 class="text-sm text-muted m-0">Nothing.</h6>
                @endif
                </div>
              <!-- List group -->
              <div class="list-group list-group-flush">
                @foreach($notif as $nf)
                <?php
                  $today = Carbon::now()->toDateTimeString();
                  $to = Carbon::createFromFormat('Y-m-d H:s:i', $today);
                  // $send = $nf->implode('send_at',',');
                  $from = Carbon::createFromFormat('Y-m-d H:s:i', $nf->send_at);

                  $diffs = $to->diffInHours($from);
                  if ($diffs <= 24) {
                    $diff = $diffs.' hrs';
                  }else{
                    $diff = $to->diffInDays($from).' days';
                  }

                ?>
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">

                    <div class="col-auto">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="mb-0 text-sm">{{$nf->sender}}</h4>
                        </div>
                        <div class="text-right text-muted">
                          <small>{{$diff}} ago</small>
                        </div>
                      </div>
                      <p class="text-sm mb-0">{{$nf->notification}}</p>
                    </div>
                  </div>
                </a>
                @endforeach

              </div>
              <!-- View all -->
              <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
            </div>
          </li>

        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">

                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name ?? 'Guest'}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Change Password</span>
              </a>
              <!-- <a href="#!" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

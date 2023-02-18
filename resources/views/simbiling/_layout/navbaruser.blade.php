<nav class="navbar navbar-top navbar-expand navbar-dark bg-white border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <img src="../assets/argon/img/brand/logo_wikrama.png"  class="navbar-brand-img" alt="...">
        <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item">
                <a class="nav-link" href="#home">Home
                <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="nav-inner-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                <div class="dropdown-menu" aria-labelledby="nav-inner-primary_dropdown_1">
                <a class="dropdown-item" href="javascript:;">Data Siswa</a>
                 <a class="dropdown-item" href="javascript:;">Data Rombel</a>
                 <a class="dropdown-item" href="javascript:;">Data Alumni</a>
                </div>
                </li>
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:;" id="nav-inner-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edukasi</a>
                <div class="dropdown-menu" aria-labelledby="nav-inner-primary_dropdown_1">
                <a class="dropdown-item" href="#rpl">Rekayasa Perangkat Lunak</a>
                 <a class="dropdown-item" href="javascript:;">Tata Boga</a>
                 <a class="dropdown-item" href="javascript:;">Multimedia</a>
                 <a class="dropdown-item" href="javascript:;">Otomasisasi Tata Kelola Perkantoran</a>
                 <a class="dropdown-item" href="javascript:;">Bisnis Daring dan Pemasaran</a>
                 <a class="dropdown-item" href="javascript:;">Perhotelan</a>
                </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:;" id="nav-inner-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Test</a>
                    <div class="dropdown-menu" aria-labelledby="nav-inner-primary_dropdown_1">
                    <a class="dropdown-item" href="javascript:;">Test Riasec</a>
                     <a class="dropdown-item" href="javascript:;">Test Peminatan</a>
                    </div>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">Jadwal Bimbingan</a>
                    </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:;">Contact</a>
                </li>

          <?php
          use App\Models\Notification;
          use Carbon\Carbon;

          $role = Auth::user()->roleSlug;
          $notif = Notification::where('reciever', $role)->orderBy('send_at', 'desc')->paginate(5);
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
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">

                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm">{{Auth::user()->name ?? 'Guest'}}</span>
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

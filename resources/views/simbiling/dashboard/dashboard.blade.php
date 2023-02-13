@extends('simbiling._layout.app')
@section('content')
<link rel="stylesheet" href="/assets/css/dashboard.css">

<br>
<div class="row">
  <div class="col-4">
    <div class="card p-4 card-dashboard border-left-primary">
      <div class="body-card">
        <span class="text-dark label-dashboard">Kelas 10</span><br>
        <div class="mini-label dateLocal"><?= date("d F Y"); ?></div>
        <span class="text-dark">10</span><br>
        <span class="text-dark label-dashboard-bawah">Siswa</span>
      </div>
      <!-- <div class="col-auto adjust-chart">
        <canvas id="myPieChart" width="100%" height="90"></canvas>
      </div> -->
    </div>
  </div>
  <div class="col-4">
    <div class="card p-4 card-dashboard border-left-primary">
      <div class="body-card">
        <span class="text-dark label-dashboard">Kelas 11</span><br>
        <div class="mini-label dateLocal"><?= date("d F Y"); ?></div>
        <span class="text-dark">7</span><br>
        <span class="text-dark label-dashboard-bawah">Siswa</span>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card p-4 card-dashboard border-left-primary">
      <div class="body-card">
        <span class="text-dark label-dashboard">Kelas 12</span><br>
        <div class="mini-label dateLocal"><?= date("d F Y"); ?></div>
        <span class="text-dark">27</span><br>
        <span class="text-dark label-dashboard-bawah">Siswa</span>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card p-4 card-dashboard">
      <div class="body-card">
        <span class="text-dark label-dashboard">Kelas 10</span><br>
        <span class="text-dark">10</span><br>
        <span class="text-dark label-dashboard-bawah">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quod delectus, totam maiores ipsa qui tenetur recusandae numquam voluptatem quisquam?</span>
      </div>
    </div>
  </div>
</div>

<script src="/assets/js/moment/moment.js"></script>
<script src="/assets/js/moment/moment-with-locales.js"></script>
<script>
  $(document).ready(() => {
    moment.locale('id')
    $('.dateLocal').map((i, date) => {
      var dateLocal = moment($(date).html().replace(/\s/g, '')).format('DD [,] MMMM YYYY')
      $(date).html(dateLocal)
    })
  });
</script>
<!-- <script>
  Chart.defaults.global.defaultFontFamily = "arial";
  Chart.defaults.global.defaultFontColor = "black";

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: "",
      datasets: [{
        data: [12.21, 15.58, 11.25, 8.32],
        backgroundColor: ['red', 'orange', 'yellow', 'green'],
      }],
    },
  });
</script> -->
<!-- <script>
  $(document).ready(function() {
    var chart = $($myPieChart).get(0).getContext("2d");

    var data = [{
        value: 30,
        color: "pink",
        label: "kelas 10"
      },
      {
        value: 60,
        color: "blue",
        label: "kelas 11"
      },
      {
        value: 45,
        color: "yellow",
        label: "kelas 12"
      }
    ];
    var piechart = new Chart(chart).Pie(data);
  });
</script> -->
@endsection
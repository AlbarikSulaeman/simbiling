@extends('simbiling._layout.user')
@section('content')
<link rel="stylesheet" href="assets/argon/css/jadwal-bimbingan.css">
<br>
<div class="container">
    <div class="jadwal">
        <form action="">
            <h1>Jadwal Bimbingan</h1>
            <hr>
            <div class="form-identitas">
                <h4>IDENTITAS</h4>
                <input type="text" placeholder="NIS">
                <input type="text" placeholder="No Telepon">
                <input type="text" class="inputnama" placeholder="Nama">
                <input type="text" class="inputkelas" placeholder="Rombel">
                <input type="text" class="inputkelas" placeholder="Rayon">
            </div>
            <div class="form-jadwalbimbingan">
                <h4>Jadwal Bimbingan</h4>
                <input type="text" placeholder="Perihal">
                <div class="datetime">
                <label class="label-date">Date</label>
                <label class="label-time">Time</label>
                <br>
                <input type="date">
                <input type="time">
                </div>
            </div>
            <button class="input-jadwal">Submit</button>
        </form>
    </div>
</div>
@endsection
@extends('simbiling._layout.user')
@section('content')

<link rel="stylesheet" href="{{asset('assets/argon/css/jadwal-bimbingan.css')}}">
<br>
<div class="container">
    <div class="jadwal">
        <form action="add/{{$siswa->id}}" method="POST">
            @csrf
            <h1>Jadwal Bimbingan</h1>
            <hr>
            <div class="form-identitas">
                <h4>IDENTITAS</h4>
                <input name="nis" value="{{$siswa->nis ?? ''}}" type="text" placeholder="NIS" disabled>
                <input name="telp" type="text" placeholder="No Telepon">
                <input name="name" value="{{$siswa->name ?? ''}}" type="text" class="inputnama" placeholder="Nama" disabled>
                <input name="rombel" value="{{$siswa->rombel ?? ''}}" type="text" class="inputkelas" placeholder="Rombel" disabled>
                <input name="rayon" value="{{$siswa->rayon ?? ''}}" type="text" class="inputkelas" placeholder="Rayon" disabled>
            </div>
            <div class="form-jadwalbimbingan">
                <h4>Jadwal Bimbingan</h4>
                <input name="prihal" type="text" placeholder="Perihal">
                @if ($errors->has('prihal'))
                    <br>
                        <strong class="text-danger label-date">{{ $errors->first('prihal') }}</strong>
                @endif
                <div class="datetime">
                <label class="label-date">Date</label>
                {{-- <label class="label-time">Time</label> --}}
                <br>
                <input name="date" type="date" id="date">
                @if ($errors->has('date'))
                    <br>
                        <strong class="text-danger label-date">{{ $errors->first('date') }}</strong>
                @endif
                {{-- <input name="hour" type="time"> --}}
                <button class="input-jadwal">Submit</button>
            </div>

        </form>
    </div>
</div>
@endsection

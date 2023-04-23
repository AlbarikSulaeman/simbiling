@extends('simbiling._layout.admin')
@section('content')
<script>
$(document).ready(function(){
    $('#jurusan').change(function(){ //kalau input dengan id jurusan berubah maka akan menjalankan fungsi ini
        var id = $(this).val();
        var url = '{{ route("getDetails", ":id") }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response){
                if(response != null){
                    $('#rombel').val(response.rombel);//mengisi input dengan id rombel dengan respone yang diterima dari controller
                }
            }
        });
    });
});

</script>
        <div class="row justify-content-center">
            <div class="col-lg-5">

                {{-- Jika kita berhasil melakukan registrasi alert ini akan muncul , alert ini diatur didalam RegisterController --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
@endif
                <div class="container">
                    <h5 class="sidebar-heading" ><a href="/simbiling/rombel"style="color: black; text-decoration: none;"><-kembali</a></h5>
                    <main class="form-register">
                        <form action="add" method="POST">
                           @csrf

                            <h1 class="h3 mb-3 fw-normal">Tambahkan Rombel</h1>
                            <div class="form-floating">
                                <select name="jurusan" id="jurusan" class="form-control mt-2">
                                    <option value="" disabled selected>Silahkan Pilih Jurusan</option>
                                    @foreach($major as $jurusan)
                                        <option id="jurusan-opt" value="{{$jurusan}}">{{$jurusan}}</option>
                                    @endforeach

                                </select>
                                <label for="jurusan">Jurusan</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="rombel" class="form-control mt-2" id="rombel" placeholder="Rombel" readonly>
                                <label for="rombel">Rombel</label>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Tambah</button>

                        </form>
                    </main>
                </div>
            </div>
        </div>
        @endsection

@extends('simbiling._layout.admin')
@section('content')
        <div class="row justify-content-center">
            <div class="col-lg-5">
                
                {{-- Jika kita berhasil melakukan registrasi alert ini akan muncul , alert ini diatur didalam RegisterController --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" student="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" student="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
@endif
                <div class="container">
                    <h5 class="sidebar-heading" ><a href="/simbiling/student"style="color: black; text-decoration: none;"><-kembali</a></h5>
                    <main class="form-register">
                        <form action="add" method="POST">
                           @csrf
                           
                            <h1 class="h3 mb-3 fw-normal">Tambahkan Siswa</h1>
                            <div class="form-floating">
                                <input type="text" name="email" class="form-control mt-2" id="email" placeholder="Email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control mt-2" id="name" placeholder="Name">
                                <label for="name">Student Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="nis" class="form-control mt-2" id="nis" placeholder="nis">
                                <label for="nis">Nis</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="rombel" class="form-control mt-2" id="rombel" placeholder="rombel">
                                <label for="rombel">Rombel</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="rayon" class="form-control mt-2" id="rayon" placeholder="rayon">
                                <label for="rayon">Rayon</label>
                            </div>
                            
                            <div class="form-floating">
                                <input type="text" name="status" class="form-control mt-2" id="status" placeholder="status">
                                <label for="status">Status</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="trouble" class="form-control mt-2" id="trouble" placeholder="trouble">
                                <label for="trouble">Trouble</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Tambah</button>
                            
                        </form>
                    </main>
                </div>
            </div>
        </div>
        @endsection
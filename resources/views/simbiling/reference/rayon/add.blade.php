@extends('simbiling._layout.app')
@section('content')
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
                    <h5 class="sidebar-heading" ><a href="/simbiling/rayon"style="color: black; text-decoration: none;"><-kembali</a></h5>
                    <main class="form-register">
                        <form action="add" method="POST">
                           @csrf
                           
                            <h1 class="h3 mb-3 fw-normal">Tambahkan Rayon</h1>

                            <div class="form-floating">
                                <input type="text" name="rayon" class="form-control mt-2" id="rayon" placeholder="Rayon">
                                <label for="rayon">Rayon</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="description" class="form-control mt-2" id="description" placeholder="description">
                                <label for="description">Description</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Tambah</button>
                            
                        </form>
                    </main>
                </div>
            </div>
        </div>
        @endsection
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
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="email">Email</label>
                                <input type="text" name="email" class="form-control mt-2" id="email" placeholder="Email">
                            </div>
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="name">Student Name</label>
                                <input type="text" name="name" class="form-control mt-2" id="name" placeholder="Name">
                            </div>
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="nis">Nis</label>
                                <input type="text" name="nis" class="form-control mt-2" id="nis" placeholder="nis">
                            </div>
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="rombel">Rombel</label>
                                <select name="rombel" id="rombel-option" class="form-control mt-2">
                                    @if(count($rombels)>0)
                                        <option value="" disabled selected>Silahkan Pilih Rombel</option>
                                            @foreach($rombels as $rombel)
                                                <option value="{{$rombel->rombel}}">{{$rombel->rombel}}</option>
                                            @endforeach
                                    @else
                                        <option value="" disabled selected>Data Rombel Kosong</option>
                                    @endif
                                        
                                </select>
                            </div>
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="rayon">Rayon</label>
                                <select name="rayon" id="rayon-option" placeholder="tes" class="form-control mt-2">
                                <option value="" disabled selected>Silahkan Pilih Rayon</option>
                                @if(count($rayons)>0)
                                    @foreach($rayons as $rayon)
                                        <option value="{{$rayon->rayon}}">{{$rayon->rayon}}</option>
                                    @endforeach
                                    @else
                                        <option value="" disabled selected>Data Rombel Kosong</option>
                                    @endif
                                </select>
                                
                            </div>
                            
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="status">Status</label>
                                <select name="status" id="rayon-option" class="form-control mt-2">
                                    
                                    @foreach($status as $stat)
                                        <option value="{{$stat}}">{{$stat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-1 ml-2">
                                <label class="text-dark" for="trouble">Trouble</label>
                                <input type="text" name="trouble" class="form-control mt-2" id="trouble" placeholder="trouble">
                                
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Tambah</button>
                            
                        </form>
                    </main>
                </div>
            </div>
        </div>
        @endsection
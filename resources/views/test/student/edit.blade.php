
        <?php
        //dd($student->_id);
        ?>
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
                    <h5 class="sidebar-heading" ><a href="/register"style="color: black; text-decoration: none;"><-kembali</a></h5>
                    <main class="form-register">
                        <form action="/test/student/edit/{{$student->_id}}" method="POST">
                           @csrf
                           
                            <h1 class="h3 mb-3 fw-normal">Edit User</h1>

                            <div class="form-floating">
                                <input type="text" name="name" class="form-control mt-2" id="name" placeholder="nama">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="nis" class="form-control mt-2" id="nis" placeholder="nis">
                                <label for="nis">Nis</label>
                            </div>
                            <!-- <div class="form-floating">
                                <input type="password" name="password" class="form-control mt-2" id="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div> -->
                            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Ubah</button>
                            
                        </form>

                        
                    </main>
                </div>
            </div>
        </div>
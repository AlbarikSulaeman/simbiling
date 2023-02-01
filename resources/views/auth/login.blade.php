<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
  <link href="assets/css/login.css" rel="stylesheet">
</head>
<header>
    <img src="{{asset(env('APP_LOGO'))}}" class="wikrama">
</header>  
<body>
   <form action="">
    @csrf
    <div class="container-fluid">
        <div class="row">
                    <div class="col-md">
                    <img src="assets/img/login.png">
                </div>
        <div class="card">
            <div class="col-md">
                    <label for="">Username</label>
                    <input type="text" placeholder="Masukkan Username Anda...">
                    <br>
                    <label for="">Password</label>
                    <input type="text" placeholder="Masukkan Password Anda...">
            </div>
</div>
        </div>
   </form>
</div>
</body>
</html>
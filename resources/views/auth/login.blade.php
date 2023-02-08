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
            <div class="col-md-5">
                <img src="assets/img/login.png" class="logo">
            
            <div class="col-md-7 d-flex justify-content-start">
            <div class="card">
                <br>
                <h1>Login</h1>
                <h4>Username</h4>
                <input type="text" class="input">
                <br>
                <h4>Password</h4>
                <input type="text" class="input">
                <p>forgot password</p>
                <button>Login</button>
            </div>
            </div>
            </div>
        </div>
    </div>
   </form>
</body>
</html>
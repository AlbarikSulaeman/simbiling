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
    <img src="assets/img/logo_wikrama.png" class="wikrama">
</header>  
<body>
   <form action="/login" method="POST">
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
                <input name="email" type="text" class="input" value="{{ (old('email')) }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($message = Session::get('userError'))
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @endif
                <br>
                <h4>Password</h4>
                <input name="password" type="password" class="input">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                @if ($message = Session::get('error'))
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @endif
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
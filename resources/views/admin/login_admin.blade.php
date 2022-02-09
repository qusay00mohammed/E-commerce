<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>

  <!-- Bootstrap v3.4 css File -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Fontawesome v4.7 Library Icon css -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- My Custom css File -->
  <link rel="stylesheet" href="{{ asset('css/master_admin.css') }}">

  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <form action="{{ route('adminlogin') }}" method="POST" class="login">
    @csrf
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control input-lg" type="text" name="username" placeholder="Username" autocomplete="off" autofocus>
    <input class="form-control input-lg" type="password" name="password" placeholder="Password" autocomplete="new-password">
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
  </form>

  <!-- <div class="alert alert-danger"> qusay mohalma;lda</div> -->



  <!-- jQuery file -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <!-- Bootstrap v3.4 js file -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- My Custom js file -->
  <script src="{{ asset('js/myjs_admin.js') }}"></script>
</body>

</html>

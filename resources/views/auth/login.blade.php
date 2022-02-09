@extends('layouts.master_website')

@section('title', 'Login')

@section('content')

@section('upperBar')

@endsection

<div class="container">
  <h1 class="text-center"><span class="blue selected" data-class="login">Login</span> | <span data-class="signup"
      class="green">Signup</span></h1>
  <!-- Start login form -->
  <form id="log" method="POST" action="{{ route('login') }}" class="login">
    @csrf
    {{-- Start filed email --}}
    <div class="input-container">
      <input class="form-control input-lg @error('email') is-invalid @enderror" type="email" id="email" name="email"
        placeholder="E-Mail Address" value="{{ old('email') }}" autocomplete="email" autofocus required>
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- End filed email --}}

    {{-- Start filed password --}}
    <div class="input-container">
      <input class="form-control input-lg @error('password') is-invalid @enderror" type="password" id="password"
        name="password" placeholder="Password" autocomplete="current-password" required>
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- End filed password --}}

    <div class="input-container">
      <input class="btn btn-primary btn-block" type="submit" value="Login">
    </div>
  </form>
  <!-- End login form -->





  <!-- Start signup form -->
  <form id="log" method="POST" action="{{ route('register') }}" class="signup">
    @csrf
    {{-- Start filed username --}}
    <div class="input-container">
      <input id="name" type="text" class="form-control  input-lg @error('username') is-invalid @enderror"
        name="username" value="{{ old('name') }}" required autocomplete="username" autofocus placeholder="Username">
      @error('username')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- End filed username --}}

    {{-- Start filed email --}}
    <div class="input-container">
      <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- End filed email --}}

    {{-- Start filed password --}}
    <div class="input-container">
      <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror"
        name="password" required autocomplete="new-password" placeholder="Password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- End filed password --}}
    {{-- Start filed confirm password --}}
    <div class="input-container">
      <input class="form-control input-lg" id="password-confirm" type="password" name="password_confirmation" required
        autocomplete="new-password" placeholder="Confirm Password">
    </div>
    {{-- End filed confirm password --}}

    {{-- Start filed confirm password --}}
    <div class="input-container">
      <input class="form-control input-lg @error('fullname') is-invalid @enderror" id="fullname" type="text"
        name="fullname" required placeholder="Full Name">
      @error('fullname')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    {{-- End filed confirm password --}}

    <div class="input-container">
      <input class="btn btn-success btn-block" type="submit" value="Signup">
    </div>
  </form>
  <!-- End signup form -->
</div>

@endsection

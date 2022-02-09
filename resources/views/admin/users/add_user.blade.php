@extends('layouts.master_admin')

@section('title', 'add user')

@section('content')

<div class="container">
  <h1 class="text-center">Add Member</h1>
  <form action="{{ route('saveUser') }}" method="POST" class="form-horizontal" autocomplete="off"
    enctype="multipart/form-data">
    @csrf
    <!-- Start username field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-2 control-label">Username <span class="required">*</span></label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" required placeholder="USER NAME TO LOGIN INTO SHOP">
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End username field -->

    <!-- Start password field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-2 control-label">Password <span class="required">*</span></label>
      <div class="col-sm-10">
        <input style="padding-right: 35px" type="password" name="password" class="form-control pass" required
          placeholder="PASSWORD MUST BE HARD&COMPLEX">
        <i class="fa fa-eye show-pass"></i>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End passowd field -->

    <!-- Start email field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-2 control-label">Email <span class="required">*</span></label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" required placeholder="EMAIL MUST BE VALID">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End email field -->

    <!-- Start Full Name field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-2 control-label">Full Name <span class="required">*</span></label>
      <div class="col-sm-10">
        <input type="text" name="fullname" class="form-control" required
          placeholder="FULL NAME APEAR IN YOUR PROFILE PAGE">
        @error('fullname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <!-- End Full Name field -->

    <!-- Start user avatar field -->
    <div class="form-group form-group-lg">
      <label for="" class="col-sm-2 control-label">User Avatar</label>
      <div class="col-sm-10">
        <div class="custom_file">
          <input type="file" name="photo_id">
          <span>Choose Item Photo</span>
        </div>
      </div>
    </div>
    <!-- End user avatar field -->

    <!-- Start submit field -->
    <div class="form-group form-group-lg">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Add Member" class="btn btn-primary btn-lg">
      </div>
    </div>
    <!-- End submit field -->
  </form>
</div>

@endsection

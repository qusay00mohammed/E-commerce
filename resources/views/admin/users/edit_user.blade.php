@extends('layouts.master_admin')

@section('title', 'edit user')

@section('content')

<div class="container">
    <h1 class="text-center">Edit Member</h1>
    <form action="{{ route('updateUser', $user->id) }}" method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <!-- Start username field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Username <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" required placeholder="USER NAME TO LOGIN INTO SHOP" value="{{ $user->username }}">
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End username field -->

        <!-- Start password field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control pass" placeholder="PASSWORD MUST BE HARD&COMPLEX">
                <i class="fa fa-eye show-pass"></i>
            </div>
        </div>
        <!-- End passowd field -->

        <!-- Start email field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Email <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required placeholder="EMAIL MUST BE VALID" value="{{ $user->email }}">
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
                <input type="text" name="fullname" class="form-control" required placeholder="FULL NAME APEAR IN YOUR PROFILE PAGE" value="{{ $user->fullname }}">
                @error('fullname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End Full Name field -->


        <!-- Start user avatar field -->
        <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">User Avatar</label>
            <div class="col-sm-8">
                <div class="custom_file">
                    <input type="file" name="photo_id">
                    <span>Choose Item Photo</span>
                </div>
                @error('photo_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="col-sm-2">
                <img width="100px" height="100px" src="{{ $user->photo ? asset('images/photo_user/' . $user->photo->name_photo) : asset('images/afatar.png') }}">
            </div> --}}
        </div>
        <!-- End user avatar field -->

        <!-- Start visibility field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">role</label>
            <div class="col-sm-10">
                <input {{ $user->groupId == 0 ? 'checked' : '' }} type="radio" id="user" name="groupId" value="0">
                <label for="user">user</label>
                <br>
                <input {{ $user->groupId == 1 ? 'checked' : '' }} type="radio" id="admin" name="groupId" value="1">
                <label for="admin">admin</label>
            </div>
        </div>
        <!-- End visibility field -->

        <!-- Start submit field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Update" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- End submit field -->
    </form>
</div>

@endsection

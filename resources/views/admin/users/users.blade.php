@extends('layouts.master_admin')

@section('title', 'users')

@section('content')

@if (Session::has('success'))
<div class="col-12 alert alert-success justify-content-center d-flex">
  <p class="text-center">{{ Session::get('success') }}</p>
</div>
@endif

@if (Session::has('error'))
<div class="col-12 alert alert-danger justify-content-center d-flex">
  <p class="text-center">{{ Session::get('error') }}</p>
</div>
@endif

<div class="container">

  <h1 class="text-center">Manage Members</h1>
  <a style="margin-bottom: 10px" href="{{ route('addUser') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add
    New Member</a>
  <a style="margin-bottom: 10px" href="{{ route('userPDF') }}" class="btn btn-primary"><i class="fa fa-print"></i> Print
    Users</a>
  <div class="table-responsive">
    <table class="table table-bordered text-center main-table">
      <tr>
        <td>#ID</td>
        <td>Avatar</td>
        <td>Username</td>
        <td>Email</td>
        <td>Full Name</td>
        <td>Registerd Date</td>
        <td>Control</td>
      </tr>

      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td><img width="50px" height="50px"
            src="{{ $user->photo ? asset('images/photo_user/' . $user->photo->name_photo) : asset('images/afatar.png') }}">
        </td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->fullname }}</td>
        <td>{{ $user->created_at->toDateString() }}</td>
        <td>
          <a href="{{ route('editUser', ['id'=>$user->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit
          </a>
          <a href="{{ route('deleteUser', ['id'=>$user->id]) }}" class="btn btn-danger confirm"><i
              class="fa fa-close"></i> Delete </a>
          @if ($user->regStatus == 0)
          <a href="{{ route('activate', ['id'=>$user->id]) }}" class="btn btn-info activate"><i class="fa fa-check"></i>
            activate </a>
          @endif
        </td>
      </tr>
      @endforeach

    </table>
  </div>
  {{ $users->links() }}
</div>

@endsection

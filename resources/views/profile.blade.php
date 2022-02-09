@extends('layouts.master_website')

@section('title', 'Profile')

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



<h1 class="text-center">My Profile</h1>

{{-- Start my information --}}
<div class="information block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">My Information</div>
      <div class="panel-body">
        <ul class="list-unstyled">
          <li>
            <i class="fa fa-unlock-alt fa-fw"></i>
            <span>Login Name:</span> {{ $user->username }}
          </li>
          <li>
            <i class="fa fa-envelope-o fa-fw"></i>
            <span>Email:</span> {{ $user->email }}
          </li>
          <li>
            <i class="fa fa-user fa-fw"></i>
            <span>Full Name:</span> {{ $user->fullname }}
          </li>
          <li>
            <i class="fa fa-calendar fa-fw"></i>
            <span>Register Date:</span> {{ $user->created_at->toDateString() }}
          </li>
        </ul>
        <a style="box-shadow: 2px 3px 3px #888;" class="btn btn-default"
          href="{{ route('editProfile', ['id'=>$user->id]) }}">Edit Information</a>
      </div>
    </div>
  </div>
</div>
{{-- End my information --}}


{{-- Start my ads --}}
<div id="my-ads" class="my-ads block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">My Advertisements</div>
      <div class="panel-body">
        <div class="row">
          @foreach ($user->items as $item)
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail item-box">
              <span class="price">${{ $item->price }}</span>
              @if ($item->regStatus == 0)
              <span class="approve">Not Approve</span>
              @endif

              <img style="width: 250px; height: 250px;" class="img-responsive"
                src="{{ $item->photo ? asset('images/photo_item/' . $item->photo->name_photo) : 'images/afatar.png' }}">
              <div class="captin">
                <h3><a href="{{ route('showItem', $item->id) }}">{{ $item->name }}</a></h3>
                <p>{{ $item->description }}</p>
                <div class="date">{{ $item->created_at->toDateString() }}</div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  {{-- End my ads --}}

  {{-- Start my comments --}}
  <div class="my-comments block">
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">My Comments</div>
        <div class="panel-body">
          <ul class="list-unstyled">
            @foreach ($user->comments as $comment)
            <li class="comment">
              <span>{{ $comment->comment }}</span>
              <a href="{{ route('delcomment', ['id'=>$comment->id]) }}" class="btn btn-danger pull-right confirm"><i
                  class="fa fa-close"></i> Delete </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  {{-- End my comments --}}

  @endsection

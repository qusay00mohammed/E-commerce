@extends('layouts.master_admin')

@section('title', 'Dashboard')

@section('content')

<div class="container home-stats text-center">
  <h1>Dashboard</h1>
  <div class="row">
    <div class="col-md-3">
      <div class="stat st-members">
        <i class="fa fa-user"></i>
        <div class="info">
          Total Members
          <span><a href="{{ route('users') }}">{{ $totalUser->count() }}</a></span>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="stat st-pending">
        <i class="fa fa-user-plus"></i>
        <div class="info">
          Pending Members
          <span><a href="{{ route('usersPending') }}">{{ $pendeningUser->count() }}</a></span>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="stat st-items">
        <i class="fa fa-tag"></i>
        <div class="info">
          Total Item
          <span><a href="{{ route('items') }}">{{ $totalItem->count() }}</a></span>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="stat st-comments">
        <i class="fa fa-comments"></i>
        <div class="info">
          Total comments
          <span><a href="{{ route('comments') }}">{{ $totalComment->count() }}</a></span>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="latest">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <li class="fa fa-users"></li>
            Latest registerd {{ $latestUsers->count() }} users
            <span class="toggle-info pull-right">
              <i class="fa fa-plus fa-lg"></i>
            </span>
          </div>
          <div class="panel-body">
            <ul class="list-unstyled latest-users">

              @foreach ($latestUsers as $user)
              <li>
                {{ $user->username }}
                <a href="{{ route('editUser', ['id'=>$user->id]) }}"><span
                    class="btn btn-success pull-right fa fa-edit">Edit</span></a>

                @if ($user->regStatus == 0)
                <a href="{{ route('activate', ['id'=>$user->id]) }}"><span
                    class="btn btn-info pull-right fa fa-check activate">activate</span></a>
                @endif
              </li>
              @endforeach

            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <li class="fa fa-tag"></li>
            Latest registerd {{ $latestItem->count() }} items
            <span class="toggle-info pull-right">
              <i class="fa fa-plus fa-lg"></i>
            </span>
          </div>
          <div class="panel-body">
            <ul class="list-unstyled latest-users">

              @foreach ($latestItem as $item)
              <li>
                {{ $item->name }}
                <a href="{{ route('edititems', ['id'=>$item->id]) }}"><span
                    class="btn btn-success pull-right fa fa-edit">Edit</span></a>

                @if ($item->regStatus == 0)
                <a href="{{ route('approved', ['id'=>$item->id]) }}"><span
                    class="btn btn-info pull-right fa fa-check activate">activate</span></a>
                @endif
              </li>
              @endforeach

            </ul>
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <li class="fa fa-comments-o"></li>
            Latest registerd {{ $latestComment->count() }} comments
            <span class="toggle-info pull-right">
              <i class="fa fa-plus fa-lg"></i>
            </span>
          </div>
          <div class="panel-body">
            @foreach ($latestComment as $tc)
            <div class="comment-box">
              <span class="member-n">{{ $tc->user->username }}</span>
              <p class="member-c">{{ $tc->comment }}</p>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

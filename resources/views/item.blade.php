@extends('layouts.master_website')

@section('title', 'Show Item')

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

{{-- Start information item --}}
<h1 class="text-center">{{ $item->name }}</h1>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <img style="width: 250px; height: 333px;"
        src="{{ $item->photo ? asset('images/photo_item/' . $item->photo->name_photo) : '' }}">
    </div>
    <div class="col-md-9 item-info">
      {{-- <h2>{{ $item->name }}</h2> --}}
      <p>{{ $item->description }}</p>
      <ul class="list-unstyled">
        <li>
          <i class="fa fa-calendar fa-fw"></i>
          <span>Added Date</span> : {{ $item->created_at->toDateString() }}
        </li>
        <li>
          <i class="fa fa-money fa-fw"></i>
          <span>Price</span> : ${{ $item->price }}
        </li>
        <li>
          <i class="fa fa-building fa-fw"></i>
          <span>Made In</span> : {{ $item->countryMade != '' ?  $item->countryMade  : 'unknown' }}
        </li>
        <li>
          <i class="fa fa-tags fa-fw"></i>
          <span>Category</span> : <a href="{{ route('category', ['id'=>$item->categorie->id]) }}">{{
            $item->categorie->name }}</a>
        </li>
        <li>
          <i class="fa fa-user fa-fw"></i>
          <span>Added By</span> : <a href="#">{{ $item->user->username }}</a>
        </li>
      </ul>
    </div>
  </div>
  {{-- Start information item --}}

  {{-- Start add comment item --}}
  @auth
  <hr class="custom-hr">
  <div class="row">
    <div class="col-md-offset-3">
      <div class="add-comment">
        <h3>Add Your Comment</h3>
        <form style="margin: 0" method="POST" action="{{ route('addComment', $item->id) }}">
          @csrf
          <textarea name="comment"></textarea>
          <input style="margin-bottom: 10px" class="btn btn-primary" type="submit" value="Add Comment">
        </form>
      </div>
    </div>
  </div>
  @endauth
  {{-- end add comment item --}}


  {{-- Start comments item --}}



  @foreach ($item->comments as $comment)
  @if ($comment->status == 1)
  <div class="row">
    <hr class="custom-hr">
    <div class="comment-box">
      <div class="col-sm-2 text-center">
        <img class="img-responsive img-circle img-thumbnail center-block"
          src="{{ $comment->user->photo ? asset('images/photo_user/' . $comment->user->photo->name_photo) : 'images/afatar.png' }}">
        <h4>{{ $comment->user->username }}</h4>
      </div>
      <div class="col-sm-10">
        <p class="lead">{{ $comment->comment }}</p>
      </div>
    </div>
  </div>
  @endif
  @endforeach


  {{-- Start comments item --}}

</div>

@endsection

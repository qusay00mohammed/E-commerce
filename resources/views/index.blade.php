@extends('layouts.master_website')

@section('title', 'index')

@section('content')

<div class="container">
  <div class="row">
    <h1 style="color: rgb(73, 71, 71)" class="text-center">All Items</h1>
    @foreach ($items as $item)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail item-box">
        <span class="price">${{ $item->price }}</span>
        <img style="width: 250px; height: 250px;"
          src="{{ $item->photo ? asset('images/photo_item/' . $item->photo->name_photo) : '' }}">
        <div class="captin">
          <h3><a href="{{ route('showItem', ['id'=>$item->id]) }}">{{ $item->name }}</a></h3>
          <p>{{ $item->description }}</p>
          <div class="date">{{ $item->created_at->toDateString() }}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection

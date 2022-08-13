@extends('layouts.master_admin')

@section('title', 'Items')

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
    <h1 class="text-center">Manage Items</h1>
    <a style="margin-bottom: 10px" href="{{ route('addItem') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add
      New Item</a>
    <div class="table-responsive">
      <table class="table table-bordered text-center main-table">
        <tr>
          <td>#ID</td>
          <td>Image</td>
          <td>Name</td>
          <td>Description</td>
          <td>Price</td>
          <td>Adding Date</td>
          <td>Control</td>
        </tr>
        @foreach ($items as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><img width="50px" height="50px"
                src="{{ $item->photo ? asset('images/photo_item/' . $item->photo->name_photo) : '' }}"></td>
            <td>{{ $item->name }}</td>
            <td style="max-width: 350px">{{ $item->description }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->created_at->toDateString() }}</td>
            <td>
              <a href="{{ route('edititems', ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i>
                Edit
              </a>
              <a href="{{ route('deleteItem', ['id' => $item->id]) }}" class="btn btn-danger confirm"><i
                  class="fa fa-close"></i> Delete </a>

              @if ($item->regStatus == 0)
                <a href="{{ route('approved', ['id' => $item->id]) }}" class="btn btn-info activate"><i
                    class="fa fa-check"></i>
                  activate </a>
              @endif

            </td>
          </tr>
        @endforeach

      </table>
    </div>
    {{ $items->links() }}
  </div>

@endsection

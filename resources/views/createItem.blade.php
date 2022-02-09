@extends('layouts.master_website')

@section('title', 'Create Item')

@section('content')

@php
use App\Categorie;
@endphp

<h1 class="text-center">Create New Item</h1>
<div class="create-ad block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">Create New Item</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-8">
            <form action="{{ route('createItem') }}" method="POST" class="form-horizontal main-form" autocomplete="off"
              enctype="multipart/form-data">
              @csrf
              <!-- Start name field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9 input-container">
                  <input type="text" name="name" class="form-control live" data-class=".live-name"
                    placeholder="NAME OF THE ITEM" required pattern=".{4,}"
                    title="This Field Require At Least 4 Characters">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- End name field -->

              <!-- Start description field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9 input-container">
                  <input type="text" name="description" class="form-control live" data-class=".live-desc"
                    placeholder="DESCRIPTION OF THE ITEM" required pattern=".{10,}"
                    title="This Field Require At Least 10 Characters">
                  @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- End description field -->

              <!-- Start price field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9 input-container">
                  <input type="text" name="price" class="form-control live" data-class=".live-price" required
                    placeholder="PRICE OF THE ITEM">
                  @error('price')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- End price field -->



              <!-- Start country field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Country</label>
                <div class="col-sm-9 input-container">
                  <input type="text" name="countryMade" class="form-control" placeholder="country OF MADE">
                </div>
              </div>
              <!-- End country field -->



              <!-- Start status field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-9">
                  <select class="form-control" name="status" id="" required>
                    <option value="">...</option>
                    <option value="1">New</option>
                    <option value="2">Like New</option>
                    <option value="3">Used</option>
                    <option value="4">Old</option>
                  </select>
                  @error('status')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- End status field -->

              <!-- Start categories field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Category</label>
                <div class="col-sm-9">
                  <select class="form-control" name="categorie_id" id="" required>
                    <option value="">...</option>

                    @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                    <?php
                                        $childCat = Categorie::select('*')->where(['parent' => $cat->id])->get();
                                        ?>

                    @foreach ($childCat as $c)
                    <option value="{{ $c->id }}">==> {{ $c->name }}</option>
                    @endforeach

                    @endforeach

                  </select>
                  @error('categorie_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- End categories field -->

              <!-- Start photo item field -->
              <div class="form-group form-group-lg">
                <label for="" class="col-sm-3 control-label">Item Photo</label>
                <div class="col-sm-9">
                  <div class="custom_file">
                    <input type="file" name="photo_id" required>
                    <span>Choose Item Photo</span>
                  </div>
                  @error('photo_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- End photo item field -->

              <!-- Start submit field -->
              <div class="form-group form-group-lg">
                <div class="col-sm-offset-3 col-sm-9">
                  <input type="submit" value="Add Item" class="btn btn-primary btn-lg">
                </div>
              </div>
              <!-- End submit field -->
            </form>
          </div>

          <div class="col-md-4">
            <div class="thumbnail item-box live-preview">
              <span class="price">$<i class="live-price">0</i></span>
              <img class="img-responsive" src="images/afatar.png" alt="">
              <div class="captin">
                <h3 class="live-name">Title</h3>
                <p class="live-desc">Description</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

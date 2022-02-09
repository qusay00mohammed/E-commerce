@extends('layouts.master_admin')

@section('title', 'Add Item')

@section('content')

<?php
use App\Categorie;
?>

<div class="container">
    <h1 class="text-center">Add Item</h1>
    <form action="{{ route('saveItem') }}" method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <!-- Start name field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Name<span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" required placeholder="NAME OF THE ITEM">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End name field -->

        <!-- Start description field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Description<span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="description" class="form-control" required placeholder="DESCRIPTION OF THE ITEM">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End description field -->

        <!-- Start price field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Price<span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="price" class="form-control" required placeholder="PRICE OF THE ITEM">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End price field -->



        <!-- Start country field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
                <input type="text" name="countryMade" class="form-control" placeholder="country OF MADE">
            </div>
        </div>
        <!-- End country field -->



        <!-- Start status field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Status<span class="required">*</span></label>
            <div class="col-sm-10">
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

        <!-- Start members field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Member<span class="required">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" name="user_id" id="" required>
                    <option value="">...</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End members field -->

        <!-- Start categories field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Category<span class="required">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" name="categorie_id" id="" required>
                    <option value="">...</option>


                    @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                        <?php
                        $childCat = Categorie::select('*')->where(['parent' => $cat->id])->get();
                        ?>
                        @foreach ($childCat as $c)
                        <option value="{{ $c->id }}">==>{{ $c->name }}</option>
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
            <label for="" class="col-sm-2 control-label">Item Photo <span class="required">*</span></label>
            <div class="col-sm-10">
                <div class="custom_file">
                    <input type="file" name="photo_id" required><br>
                </div>
                @error('photo_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    <!-- End photo item field -->


        <!-- Start submit field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Add Item" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- End submit field -->
    </form>
</div>

@endsection

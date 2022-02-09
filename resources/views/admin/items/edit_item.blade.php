@extends('layouts.master_admin')

@section('title', 'Edit Item')

@section('content')

<?php
use App\Categorie;
?>

<div class="container">
    <h1 class="text-center">Edit Item</h1>
    <form action="{{ route('updateItem', $item->id) }}" method="POST" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <!-- Start name field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Name<span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" required placeholder="NAME OF THE ITEM" value="{{ $item->name }}">
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
                <input type="text" name="description" class="form-control" required placeholder="DESCRIPTION OF THE ITEM" value="{{ $item->description }}">
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
                <input type="text" name="price" class="form-control" required placeholder="PRICE OF THE ITEM" value="{{ $item->price }}">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- End price field -->



        <!-- Start country field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
                <input type="text" name="countryMade" class="form-control" placeholder="country OF MADE" value="{{ $item->countryMade }}">
                @error('countryMade')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End country field -->



        <!-- Start status field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Status<span class="required">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="" required>
                    <option {{ $item->status == 1 ? 'selected' : '' }} value="1">New</option>
                    <option {{ $item->status == 2 ? 'selected' : '' }} value="2">Like New</option>
                    <option {{ $item->status == 3 ? 'selected' : '' }} value="3">Used</option>
                    <option {{ $item->status == 4 ? 'selected' : '' }} value="4">Old</option>
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
                    @foreach ($users as $user)
                    <option {{ $item->user_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->username }}</option>
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

                    @foreach ($categories as $cat)
                    <option {{ $item->categorie_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                        <?php
                        $childCat = Categorie::select('*')->where(['parent' => $cat->id])->get();
                        ?>
                        @foreach ($childCat as $c)
                        <option {{ $item->categorie_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">==>{{ $c->name }}</option>
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
            <div class="col-sm-8">
                <div class="custom_file">
                    <input type="file" name="photo_id" required><br>
                </div>
                @error('photo_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="col-sm-2">
                <img width="80px" height="80px" src="{{ $item->photo ? asset('images/photo_item/' . $item->photo->name_photo) : '' }}">
            </div> --}}
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


    @if (($item->comments)->isNotEmpty())

    <h1 class="text-center">Manage Comments</h1>
            <div class="table-responsive">
                <table class="table table-bordered text-center main-table">
                    <tr>
                        <td>Comment</td>
                        <td>User Name</td>
                        <td>Added Date</td>
                        <td>Control</td>
                    </tr>
                    @foreach ($item->comments as $comment)
                    <tr>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->user->username }}</td>
                        <td>{{ $comment->created_at->toDateString() }}</td>
                        <td>
                            <a href="{{ route('edititems', ['id'=>$item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit </a>
                            <a href="{{ route('deleteItem', ['id'=>$item->id]) }}" class="btn btn-danger confirm"><i class="fa fa-close"></i> Delete </a>

                            @if ($item->regStatus == 0)
                            <a href="{{ route('approved', ['id'=>$item->id]) }}" class="btn btn-info activate"><i class="fa fa-close"></i> activate </a>
                            @endif

                        </td>
                    </tr>

                    @endforeach

                </table>
            </div>
    @endif



</div>

@endsection

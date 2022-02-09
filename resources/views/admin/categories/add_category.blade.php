@extends('layouts.master_admin')

@section('title', 'add category')

@section('content')

    <div class="container">
        <h1 class="text-center">Add Category</h1>
        <form action="{{ route('saveCategory') }}" method="POST" class="form-horizontal" autocomplete="off">
            @csrf
            <!-- Start name field -->
            <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">Name<span class="required">*</span></label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" required placeholder="NAME OF THE CATEGORY">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- End name field -->

            <!-- Start description field -->
            <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control pass" placeholder="DESCRIBE THE CATEGORY">
                </div>
            </div>
            <!-- End description field -->

            <!-- Start ordering field -->
            <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">Ordering</label>
                <div class="col-sm-10">
                    <input type="text" name="ordering" class="form-control"  placeholder="NUMBER TO ARRANGE THE CATEGORIES">
                </div>
            </div>
            <!-- End ordering field -->

            <!-- Start category type -->
            <div class="form-group form-group-lg">
                    <label for="" class="col-sm-2 control-label">Parent?</label>
                <div class="col-sm-10">
                    <select class="form-control" name="parent" id="">
                        <option value="0">None</option>    <!-- Main Category -->
                        @foreach ($parentCat as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- End category type -->

            <!-- Start visibility field -->
            <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">Visible</label>
                <div class="col-sm-10">
                    <input type="radio" id="vis-yes" name="visibility" value="0" checked>
                    <label for="vis-yes">Yes</label>
                    <br>
                    <input type="radio" id="vis-no" name="visibility" value="1">
                    <label for="vis-no">No</label>
                </div>
            </div>
            <!-- End visibility field -->

            <!-- Start commenting field -->
            <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">Allow Commenting</label>
                <div class="col-sm-10">
                    <input type="radio" id="com-yes" name="allowComment" value="0" checked>
                    <label for="com-yes">Yes</label>
                    <br>
                    <input type="radio" id="com-no" name="allowComment" value="1">
                    <label for="com-no">No</label>
                </div>
            </div>
            <!-- End commenting field -->

            <!-- Start ads field -->
            <div class="form-group form-group-lg">
                <label for="" class="col-sm-2 control-label">Allow ads</label>
                <div class="col-sm-10">
                    <input type="radio" id="ads-yes" name="allowAds" value="0" checked>
                    <label for="ads-yes">Yes</label>
                    <br>
                    <input type="radio" id="ads-no" name="allowAds" value="1">
                    <label for="ads-no">No</label>
                </div>
            </div>
            <!-- End ads field -->

            <!-- Start submit field -->
            <div class="form-group form-group-lg">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Add Category" class="btn btn-primary btn-lg">
                </div>
            </div>
            <!-- End submit field -->
        </form>
    </div>

@endsection

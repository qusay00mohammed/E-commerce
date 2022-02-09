@extends('layouts.master_admin')

@section('title', 'Edit Comment')

@section('content')

<div class="container">
    <h1 class="text-center">Edit Comment</h1>
    <form action="{{ route('updatecomment', ['id'=>$comment->id]) }}" method="POST" class="form-horizontal" autocomplete="off">
        @csrf
        <!-- Start comment field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Comment</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="comment">{{ $comment->comment }}</textarea>
            </div>
        </div>
        <!-- End comment field -->

        <!-- Start submit field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Update" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- End submit field -->
    </form>
</div>

@endsection

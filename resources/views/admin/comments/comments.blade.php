@extends('layouts.master_admin')

@section('title', 'Comments')

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
    <h1 class="text-center">Manage Comments</h1>
    <div class="table-responsive">
        <table class="table table-bordered text-center main-table">
            <tr>
                <td>#ID</td>
                <td>Comment</td>
                <td>Item Name</td>
                <td>User Name</td>
                <td>Added Date</td>
                <td>Control</td>
            </tr>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->item->name }}</td>  {{-- $comment->item['name'] --}}
                <td>{{ $comment->user->username }}</td>
                <td>{{ $comment->created_at->toDateString() }}</td>
                <td>
                    <a href="{{ route('editcomment', ['id'=>$comment->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit </a>
                    <a href="{{ route('deleteComment', ['id'=>$comment->id]) }}" class="btn btn-danger confirm"><i class="fa fa-close"></i> Delete </a>

                    @if ($comment->status == 0)
                    <a href="{{ route('approveComment', ['id'=>$comment->id]) }}" class="btn btn-info activate"><i class="fa fa-check"></i> activate </a>
                    @endif

                </td>
            </tr>
            @endforeach

        </table>
    </div>
    {{ $comments->links() }}
</div>

@endsection

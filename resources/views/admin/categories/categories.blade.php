@extends('layouts.master_admin')

@section('title', 'categories')

@section('content')

<?php
use App\Categorie;
?>

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


    <div class="categories">
        <div class="container">
            <h1 class="text-center">Manage Categories</h1>
            <a style="margin-bottom: 10px" href="{{ route('addCategory') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Categories</a>

            <a style="margin-bottom: 10px" href="{{ route('catPDF') }}" class="btn btn-primary"><i class="fa fa-print"></i> Print Categorie</a>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-edit"></i>
                    Manage Categories

                    <div class="option pull-right">
                        <i class="fa fa-sort"></i> Ordering: [
                        <a class="{{ $sort == 'asc' ? 'active' : '' }}" href="?sort=asc" >ASC</a> |
                        <a class="{{ $sort == 'desc' ? 'active' : '' }}" href="?sort=desc" >DESC</a> ]

                        <i class="fa fa-eye"></i> View: [
                        <span data-view="full" class="active">Full</span> |
                        <span data-view="classic">Classic</span> ]
                    </div>


                </div>
                <div class="panel-body">
                    @foreach ($categories as $category)
                    <div class="cat">
                        <div class="hidden-buttons">
                            <a href="{{ route('editCategory', ['id'=>$category->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{ route('deleteCategory', ['id'=>$category->id]) }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-close"></i> delete</a>
                        </div>
                        <h3>{{ $category->name }}</h3>
                        <div class="full-view">
                            @if ($category->description == null)
                            <P>There is no description for this categories</P>
                            @else
                            <P>{{ $category->description }}</P>
                            @endif


                            @if ($category->visibility == 1)
                            <span class="visibility group-span"><i class="fa fa-eye"></i> hidden</span>
                            @endif

                            @if ($category->allowComment == 1)
                            <span class="commenting group-span"><i class="fa fa-close"></i> Comment disabled</span>
                            @endif

                            @if ($category->allowAds == 1)
                            <span class="advertises group-span"><i class="fa fa-close"></i> Allow ads is 0</span>
                            @endif

                            <!-- Start child -->

                            <?php
                            $childCat = Categorie::select('*')->where(['parent' => $category->id])->get();
                            ?>
                            @if ($childCat->isNotEmpty())
                            <h4 class="child-head">Child Category</h4>
                            <ul class="list-unstyled child-cats">
                                @foreach ($childCat as $child)
                                <li class="child-link"><a href="{{ route('editCategory', ['id'=>$child->id]) }}">{{ $child->name }}</a> <a href="{{ route('deleteCategory', ['id'=>$child->id]) }}" class="show-del confirm"> delete</a></li>
                                @endforeach
                            </ul>
                            @endif
                            <!-- End child -->

                        </div>
                    </div>
                    <hr>
                    @endforeach

                </div>
            </div>
            {{ $categories->links() }}
        </div>
    </div>

@endsection

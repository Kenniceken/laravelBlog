@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2>Create New Category</h2>               
</div>
<div class="container" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
           <form action="{{ route('categories.store') }}" method="post" class="leave-comment">
              <h4 class="m-text26 p-b-36 p-t-15">
                New Category Form
              </h4>
                  {{ csrf_field() }}

                  <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Category Name" required maxlength="100">
                  </div>
                  <div class="w-size25">
                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                      Create Category
                    </button>
                  </div>
             </form>
             <br><br>
              <a href="{{ route('categories.index') }}"> <i class="fas fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>
@endsection
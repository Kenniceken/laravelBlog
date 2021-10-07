@extends('layouts.app')
@include('partials.meta_static')
@section('content')

<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2>Create New Blog</h2>               
</div>
<div class="container" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
           <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data" class="leave-comment">
            @include('partials.error-message')
           
              <h4 class="m-text26 p-b-36 p-t-15">
                Create New Blog
              </h4>
                  {{ csrf_field() }}
                  <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="title" placeholder="Enter Blog Title">
                  </div>
                  <div class="form-group">
                    <p><h6>Choose Category</h6></p>
                    @foreach($categories as $category) 
                      <label class="containerChkbx mr-2">
                        {{ $category->name }}
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]">
                        <span class="checkmark"></span>
                      </label>  
                    @endforeach
                  </div>    
                  <div class="form-group">
                    <span class="btn btn-outline-secondary btn-file rounded-0 btn-sm">
                    Blog Featured Image <input type="file" name="featured_image">
                  </span>
                  </div><!--            
                  <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="body" placeholder="Enter Blog Content">                    
                  </textarea> -->
                  <br>
                  <p><h6>Blog Content</h6></p>
                  <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                  <br>
                  <div class="w-size25">
                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                      Create Blog
                    </button>
                  </div>
             </form>
        </div>
    </div>
</div>
@include('partials.tinymce')

<!-- ======================= -->


@endsection
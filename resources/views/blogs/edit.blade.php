@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">Update | {{ $blog->title }}</h2>               
</div>
@include('partials.tinymce')
<div class="container" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
           <form action="{{ route('blogs.update', $blog->id) }}" method="post" class="leave-comment" enctype="multipart/form-data">
              <h4 class="m-text26 p-b-36 p-t-15">
                Edit Blog
              </h4>
                  {{ csrf_field() }} {{ method_field('patch') }}

                  <div class="bo4 of-hidden size15 m-b-20">
                    <input 
                      class="sizefull s-text7 p-l-22 p-r-22" 
                      type="text" 
                      name="title" 
                      autocomplete="off"
                      value="{{ $blog->title }}"
                      placeholder="Category Name" 
                      required 
                      maxlength="100"
                      >
                  </div>
                  <div class="form-group">                    
                    {{ $blog->category->count() ? 'Current Categories: ' : '' }} &nbsp;&nbsp;
                    @foreach($blog->category as $category) 
                      <label class="containerChkbx mr-2">
                        {{ $category->name }}
                        <input type="checkbox" value="{{ $category->id }}" checked name="category_id[]">
                        <span class="checkmark"></span>
                      </label>  
                    @endforeach
                  </div>
                   <div class="form-group">                    
                    {{ $filtered->count() ? 'Choose Categories: ' : '' }} &nbsp;&nbsp;
                    @foreach($filtered as $category) 
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
                    <br>
                    <br>
                    <p>@if($blog->featured_image)
                      <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}" style="width: 100px; height: 70px;">
                    @endif </p>                     
                  </div>
                  <br>
                  <textarea 
                    name="body" class="form-control my-editor"
                    >
                      {{ $blog->body }}
                    </textarea>
                    <br>
                  <div class="w-size25">
                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                      Update Blog
                    </button>
                  </div>
             </form>
             <br>
               <a href="{{ route('blogs')}}"> <i class="fas fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>

@endsection

<!-- ================= -->

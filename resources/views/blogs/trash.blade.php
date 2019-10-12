@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">Trashed Blogs</h2>               
</div>
<section class="bgwhite p-t-60">
    <div class="container" style="min-height: 500px;">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75">
                <div class="p-r-50 p-r-0-lg">
                    <div class="item-blog p-b-80">
                      @foreach($trashedBlogs as $blog)                      
                      <h2>{{ $blog->title }}</h2>
                        <p>{{ $blog->body }}</p>
                        <br>
                        
                        <div class="btn-group">
                        <form action="{{ route('blogs.restore', $blog->id) }}" method="get">
                           {{ csrf_field() }}                  
                           <button class="btn btn-sm btn-outline-success rounded-0 float-left mr-3" type="submit"> Restore This Blog</button>
                         </form>
                        <form action="{{ route('blogs.permanent-delete', $blog->id) }}" method="post">
                           {{ method_field('delete') }} {{ csrf_field() }}
                          
                           <button class="btn btn-sm btn-outline-danger rounded-0 float-left" type="submit"> Delete Permanently</button>
                         </form>
                        </div>
                        <br>
                        <br>
                        <hr>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('blogs')}}"> <i class="fas fa-arrow-left"></i> Go Back</a>
            </div>
            <div class="col-md-4 col-lg-3 p-b-75">               
            </div>
        </div>
    </div>
</section>
@endsection


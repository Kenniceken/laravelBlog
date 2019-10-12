@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">{{ $category->name }}</h2>               
</div>
<section class="bgwhite p-t-60">
    <div class="container" style="min-height: 500px;">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75">
                <div class="p-r-50 p-r-0-lg">
                    <div class="item-blog p-b-80">
                      <!-- <a href="{{ route('categories.index') }}"> <i class="fas fa-arrow-left"></i> Go Back</a> -->
                        <h2>{{ $category->name }}</h2>
                        <br> 
                        @if(Auth::user() && Auth::user()->role_id === 1)
                             <div class="btn-group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success rounded-0 mr-3">
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                  {{ method_field('delete') }} {{ csrf_field() }}
                                  <button type="submit" class="btn btn-sm btn-outline-danger rounded-0 mr-3">
                                  <i class="fas fa-trash"></i> Trash
                                  </button>
                                </form>
                            </div>
                        @endif
                        @if(Auth::user() && Auth::user()->role_id === 2)
                             <div class="btn-group">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success rounded-0 mr-3">
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                  {{ method_field('delete') }} {{ csrf_field() }}
                                  <button type="submit" class="btn btn-sm btn-outline-danger rounded-0 mr-3">
                                  <i class="fas fa-trash"></i> Trash
                                  </button>
                                </form>
                            </div>
                        @endif

                        <br>
                        <br>
                        @foreach($category->blog as $blog)
                             <div class="item-blog-txt p-t-33">
                                <h4 class="p-b-11">
                                    <a href="{{ route('blogs.show', [$blog->slug]) }}" class="m-text24">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                <p class="p-b-12">
                                    {!! str_limit($blog->body, 300, '...') !!}
                                </p>

                                <a href="{{ route('blogs.show', [$blog->slug]) }}" class="s-text20">
                                    Continue Reading ...
                                    <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                                </a>
                                <br>
                                <br>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-75">               
            </div>
        </div>
    </div>
</section>

@endsection
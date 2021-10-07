@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
    <h2 class="blogHdTitle">{{ $user->name }}'s Blog Page</h2> 
    <br>          
</div>
<div class="container" style="min-height: 550px;">
    <div class="row pt-5">
       <div class="col-md-3 col-lg-3 p-b-75">
             <img src="/images/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; border-radius: 50%; margin-bottom: 5px;">                         
            <form enctype="multipart/form-data" action="{{ route('update.avatar') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="btn btn-outline-secondary btn-file rounded-0 btn-sm float-left">
                        Update Profile Avatar <input type="file" name="avatar">
                    </span>
                </div>
                  <br>                  
                <div class="w-size25">
                    <br>
                    <button type="submit" class="flex-c-m size1 bg1 bo-rad-20 hov1 m-text3 trans-0-4">
                      Save
                    </button>
                </div>
            </form>  
            <br>
            <br>
            <p>{{ $user->name }}</p>        
            <p>{{ $user->email }}</p> 
            <div class="w-size25">                
                <button type="submit" class="flex-c-m size1 bg1 bo-rad-20 hov1 m-text3 trans-0-4">
                  Update Profile
                </button>
            </div>       
        </div>
        <div class="col-md-7 col-lg-7 p-b-75">
            <h4>My Recent Blog Posts</h4>
            <br>
             <div class="p-r-50 p-r-0-lg">
                    <div class="item-blog p-b-80">
                        @foreach($user->blogs as $blog)
                            <a href="{{ route('blogs.show', [$blog->slug]) }}" class="item-blog-img pos-relative dis-block hov-img-zoom">
                                @if($blog->featured_image)
                                    <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}">
                                @endif

                                <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1" style="width: 160px;">
                                    {{ $blog->created_at->diffForHumans() }}
                                </span>
                            </a>
                            <div class="item-blog-txt p-t-33">
                                <h4 class="p-b-11">
                                    <a href="{{ route('blogs.show', [$blog->slug]) }}" class="m-text24">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                <div class="s-text8 flex-w flex-m p-b-21">
                                    <span>
                                        @if($blog->user)
                                          By <a href="#" class="s-text13 p-t-5 p-b-5">
                                            {{ $blog->user->name }}      
                                            </a>                               
                                        @endif                                       
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>
                                   
                                    <span>
                                        8 Comments
                                    </span>
                                </div>
                                <p class="p-b-12">
                                     {!! str_limit($blog->body, 300, '...') !!}
                                </p>

                                <a href="{{ route('blogs.show', [$blog->slug]) }}" class="s-text20">
                                    Continue Reading
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

        <div class="col-md-2 col-lg-2 p-b-75">
             <div class="rightbar">
                <div class="pos-relative bo11 of-hidden">
                    <input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">
                    <button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
                        <i class="fs-13 fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
                <h4 class="m-text23 p-t-56 p-b-34">
                    Blog Categories
                </h4>
                <ul>
                    @foreach($categories as $category)
                    <li class="p-t-6 p-b-8 bo6">
                        <a href="{{ route('categories.show', $category->slug) }}" class="s-text13 p-t-5 p-b-5">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

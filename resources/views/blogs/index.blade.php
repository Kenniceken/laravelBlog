@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">Welcome to ObiomaBlog</h2>               
</div>
<section class="bgwhite p-t-60">
    <div class="container" style="min-height: 500px;">

        @if(Session::has('blog_created_message'))
            <div class="alert alert-dismissible alert-success" role="alert">
                {{ Session::get('blog_created_message') }}
                <button tyoe="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
            </div>
        @endif

        @if(Session::has('contact_form_sent'))
            <div class="alert alert-dismissible alert-success" role="alert">
                {{ Session::get('contact_form_sent') }}
                <button tyoe="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75">
                <div class="p-r-50 p-r-0-lg">
                    <div class="item-blog p-b-80">
                        @foreach($blogs as $blog)
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
                                          By <a href="{{ route('users.show', $blog->user->name) }}" class="s-text13 p-t-5 p-b-5">
                                            {{ $blog->user->name }}      
                                            </a>                               
                                        @endif                                       
                                        <span class="m-l-3 m-r-6">|</span>
                                    </span>
                                    @foreach($blog->category as $category)
                                      <span>
                                        <a href="{{ route('categories.show', $category->slug) }}" class="s-text13 p-t-5 p-b-5">
                                        {{ $category->name }} 
                                        </a>                       
                                        <span class="m-l-3 m-r-6">|</span>
                                      </span>
                                    @endforeach
                                </div>
                                <p class="p-b-12">

                                    {!! str_limit($blog->body, 340, '...') !!}
                                </p>

                                <a href="{{ route('blogs.show', [$blog->slug]) }}" class="s-text20">
                                    Continue Reading ...
                                    <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                                </a>
                                <br>
                                <br>
                                <hr>
                                <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-75">
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
</section>
@endsection


@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
    <h2 class="blogHdTitle">{{ $user->name }}'s Blog Page</h2> 
    <br>          
</div>
<section class="bgwhite p-t-60">
    <div class="container" style="min-height: 500px;">
        <div class="row"> 
        	<div class="col-md-8 col-lg-9 p-b-75">
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

            <div class="col-md-4 col-lg-3 p-b-75">
                <div class="rightbar">
                    <h2 class="p-t-6 p-b-8 bo6">
                        	{{ $user->name }}
                    	</h2>
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


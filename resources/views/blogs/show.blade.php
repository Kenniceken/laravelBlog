@extends('layouts.app')
@include('partials.meta_dynamic')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">{{ $blog->title }}</h2>               
</div>
<section class="bgwhite p-t-60">
    <div class="container" style="min-height: 500px;">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-75">
                <div class="p-r-50 p-r-0-lg">
                    <div class="p-b-40">
                      <div class="blog-detail-img wrap-pic-w">
                        @if($blog->featured_image)
                          <img src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ Str::limit($blog->title, 50) }}">
                        @endif                      
                      </div>

                      <div class="blog-detail-txt p-t-33">
                        <h4 class="p-b-11 m-text24">
                          {{ $blog->title }}
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

                          <span>
                            {{ $blog->created_at->diffForHumans() }}
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
                        <p class="p-b-25">
                           {!! $blog->body !!}
                        </p>
                        @if(Auth::user())
                          @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 || Auth::user()->role_id === 3  && Auth::user()->id === $blog->user_id)
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-success rounded-0 float-left mr-3" href="{{ route('blogs.edit', $blog->id) }}"> 
                                <i class="fas fa-edit"></i>
                              </a> 
                               <form action="{{ route('blogs.delete', $blog->id) }}" method="post">
                                 {{ method_field('delete') }} {{ csrf_field() }}
                                 <button class="btn btn-sm btn-outline-danger rounded-0 float-left" type="submit"> <i class="fas fa-trash"></i> </button>
                               </form>                               
                             </div>
                             <br>
                               <br>
                          @endif
                        @endif                       
                      </div>
                      <!-- <div class="flex-m flex-w p-t-20">
                        <span class="s-text20 p-r-20">
                          Tags
                        </span>

                        <div class="wrap-tags flex-w">
                          <a href="#" class="tag-item">
                            Streetstyle
                          </a>

                          <a href="#" class="tag-item">
                            Crafts
                          </a>
                        </div>
                      </div> -->
                    </div>
                   <!--  <form class="leave-comment">
                        <h4 class="m-text25 p-b-14">
                          Leave a Comment
                        </h4>

                        <p class="s-text8 p-b-40">
                          Your email address will not be published. Required fields are marked *
                        </p>
                        <textarea class="col-md-9 dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Comment..."></textarea>

                        <div class="bo12 of-hidden size19 m-b-20">
                          <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name *">
                        </div>

                        <div class="bo12 of-hidden size19 m-b-20">
                          <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email *">
                        </div>

                        <div class="bo12 of-hidden size19 m-b-30">
                          <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="website" placeholder="Website">
                        </div>

                        <div class="w-size24">
                          <button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Post Comment
                          </button>
                        </div>
                      </form> -->

                      <div id="disqus_thread"></div>
                        <script>
                        (function() { 
                        var d = document, s = d.createElement('script');
                        s.src = 'https://obiomablog.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                        </script>
                      
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


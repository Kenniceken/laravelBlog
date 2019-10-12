@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">Manage Blogs</h2>               
</div>
<div class="container" style="min-height: 500px;">
    <div class="row blogDivs">        
        <div class="col-sm-12 col-lg-12">   
            <h2>Published Blogs</h2>         
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Blog ID:</th>
                        <th>Author</th>
                        <th>Blog Title</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publishedBlogs as $blog)
                    <tr>                            
                        <td>{{ $blog->id }}</td> 
                        <td>{{ $blog->user->name }}</td>                           
                        <td>{{ $blog->title }}</td> 
                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                        <td>
                              <a class="btn btn-sm btn-outline-primary rounded-0 mr-2" href="{{ route('blogs.show', $blog->slug) }}"> 
                              <i class="fas fa-eye"></i> View
                            </a> 
                        </td>
                        <td>
                         <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                           {{ method_field('patch') }} {{ csrf_field() }}
                            <input type="hidden" value="0" name="status" checked style="display: hidden">
                            <button class="btn btn-outline-secondary btn-sm rounded-0" type="submit"> <i class="fas fa-pen-square"></i> Draft</button>                               
                         </form>
                        </td>                          
                    </tr>
                    @endforeach
                </tbody>
            </table>                  
        </div>
        <!-- <a href="{{ route('categories.create') }}"> Create New Category</a>   -->      
    </div>
    <hr>
    <hr>
    <br><br>
    <hr>
    <hr>
    <div class="row blogDivs">        
        <div class="col-sm-12 col-lg-12">   
            <h2>Draft Blogs</h2>         
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Blog ID:</th>
                        <th>Author</th>
                        <th>Blog Title</th>                      
                        <th>Created Date</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($draftBlogs as $blog)
                    <tr>                            
                        <td>{{ $blog->id }}</td> 
                        <td>{{ $blog->user->name }}</td>                           
                        <td>{{ $blog->title }}</td> 
                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary rounded-0 mr-2" href="{{ route('blogs.show', $blog->slug) }}"> 
                              <i class="fas fa-eye"></i> View
                            </a> 
                        </td>
                        <td>
                         <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                           {{ method_field('patch') }} {{ csrf_field() }}
                            <input type="hidden" value="1" name="status" checked style="display: hidden">
                            <button class="btn btn-outline-success btn-sm rounded-0" type="submit"> <i class="fas fa-pen-square"></i> Publish</button>                               
                         </form>
                        </td>                         
                    </tr>
                    @endforeach
                </tbody>
            </table>                  
        </div>
        <!-- <a href="{{ route('categories.create') }}"> Create New Category</a>   -->      
    </div>
</div>
@endsection
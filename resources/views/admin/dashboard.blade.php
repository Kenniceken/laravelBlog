@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       @if(Auth::user() && Auth::user()->role_id === 1)
        <h2 class="blogHdTitle">Super Admin Dashboard</h2> 
        @elseif(Auth::user() && Auth::user()->role_id === 2)
        <h2 class="blogHdTitle">Admin Dashboard</h2> 
        @elseif(Auth::user() && Auth::user()->role_id === 3)
        <h2 class="blogHdTitle">Author Dashboard</h2> 
        @elseif(Auth::user() && Auth::user()->role_id === 4)
        <h2 class="blogHdTitle">User Dashboard</h2> 
       @endif             
</div>


<div class="container" style="min-height: 500px;">
    <div class="row blogDivs">
        <div class="col-md-12">
        @if(Auth::user() && Auth::user()->role_id === 1)            
            <div class="adminBTN1">
                <a href="{{ route('blogs.create') }}" class="adminBTNs btn btn-outline-primary mr-3 rounded-0"> Create Blog</a>
                <a href="{{ route('categories.create') }}" class="adminBTNs btn btn-outline-success mr-3 rounded-0"> Create Category</a>
                <a href="{{ route('blogs.trash') }}" class="adminBTNs btn btn-outline-danger rounded-0 mr-3 "> Trashed Blogs</a>
                <a href="{{ route('admin.blogs') }}" class="adminBTNs btn btn-outline-secondary mr-3 rounded-0"> Manage Blogs</a>
                <a href="{{ route('users.index') }}" class="adminBTNs btn btn-outline-primary mr-3 rounded-0"> Manage Users</a>
            </div>
        @endif  

        @if(Auth::user() && Auth::user()->role_id === 2)            
            <div class="adminBTN1">
                <a href="{{ route('blogs.create') }}" class="adminBTNs btn btn-outline-primary mr-3 rounded-0"> Create Blog</a>
                <a href="{{ route('categories.create') }}" class="adminBTNs btn btn-outline-success mr-3 rounded-0"> Create Category</a>
                <a href="{{ route('blogs.trash') }}" class="adminBTNs btn btn-outline-danger rounded-0 mr-3 "> Trashed Blogs</a>
                <a href="{{ route('admin.blogs') }}" class="adminBTNs btn btn-outline-secondary mr-3 rounded-0"> Manage Blogs</a>
            </div>
        @endif  

        @if(Auth::user() && Auth::user()->role_id === 3)            
            <div class="adminBTN1">
                <a href="{{ route('blogs.create') }}" class="adminBTNs btn btn-outline-primary mr-3 rounded-0"> Create Blog</a>
                <a href="{{ route('categories.create') }}" class="adminBTNs btn btn-outline-success mr-3 rounded-0"> Create Category</a>
                <!-- <a href="{{ route('blogs.trash') }}" class="adminBTNs btn btn-outline-danger rounded-0 mr-3 "> Trashed Blogs</a> -->
                <!-- <a href="{{ route('admin.blogs') }}" class="adminBTNs btn btn-outline-secondary mr-3 rounded-0"> Manage Blogs</a> -->
            </div>
        @endif
         @if(Auth::user() && Auth::user()->role_id === 4)            
            <div class="adminBTN1">
                <a href="{{ route('blogs') }}" class="adminBTNs btn btn-outline-primary mr-3 rounded-0"> View Blog</a><!-- 
                <a href="{{ route('categories.create') }}" class="adminBTNs btn btn-outline-success mr-3 rounded-0"> Create Category</a>
                <a href="{{ route('blogs.trash') }}" class="adminBTNs btn btn-outline-danger rounded-0 mr-3 "> Trashed Blogs</a>
                <a href="{{ route('admin.blogs') }}" class="adminBTNs btn btn-outline-secondary mr-3 rounded-0"> Manage Blogs</a> -->
            </div>
        @endif                       
        </div>
    </div>
</div>
@endsection


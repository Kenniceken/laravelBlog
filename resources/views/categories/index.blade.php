@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">Categories Dashboard</h2>               
</div>
<div class="container" style="min-height: 500px;">
    <div class="row blogDivs">        
        <div class="col-sm-12 col-lg-12">            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID:</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>                            
                        <td>{{ $category->id }}</td>                            
                        <td>{{ $category->name }}</td>                            
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-outline-primary btn-sm mr-3 rounded-0"><i class="fas fa-eye"></i> View</a>
                        </td>                            
                    </tr>
                    @endforeach
                </tbody>
            </table>                  
        </div>
        <a href="{{ route('categories.create') }}"> Create New Category</a>        
    </div>
</div>
@endsection
@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2 class="blogHdTitle">Manage Users</h2>               
</div>
<div class="container" style="min-height: 500px;">
    <div class="row blogDivs">        
        <div class="col-sm-12 col-lg-12">   
            <h2>List Of Users</h2>         
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID:</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered On</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>                            
                        <td>{{ $user->id }}</td>                         
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                           <div class="text-center">
	                          <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-inline">
	                          	{{ csrf_field() }} {{ method_field('patch') }}
	                           	 <select name="role_id" class="form-control mr-2 rounded-0">
	                           	 	<option selected>{{ $user->role->name }}</option>
	                           	 	<option value="1">Super</option>
	                           	 	<option value="2">Admin</option>
	                           	 	<option value="3">Author</option>
	                           	 	<option value="4">Subscriber</option>
	                           	 </select>
	                           	 <button type="submit" class="btn btn-outline-success btn-sm mt-2 rounded-0">Update</button>
	                           </form>
                           </div>
                        </td> 
                        <td>
                           <form action="{{ route('users.destroy', $user) }}" method="POST">
                           	{{ csrf_field() }} {{ method_field('delete') }}
                           	 <button type="submit" class="btn btn-outline-danger btn-sm mt-2 rounded-0">Remove</button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>                  
        </div>   
    </div>
    <hr>
</div>
@endsection
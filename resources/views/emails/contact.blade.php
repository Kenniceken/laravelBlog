@extends('layouts.app')
@include('partials.meta_static')
@section('content')

<div class="jumbotron jumbotron-fluid rounded-0 bg-info text-white text-sm-center">
       <h2>Contact Us</h2>               
</div>
<div class="container" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
           <form action="{{ route('mail.send') }}" method="post" class="leave-comment">
            @include('partials.error-message')           
              <h4 class="m-text26 p-b-36 p-t-15">
                Send Us An Email
              </h4>
                  {{ csrf_field() }}
                  <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Enter Your Name" value="{{ old('name') }}">
                  </div>
                  <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                  </div>
                  <div class="bo4 of-hidden size15 m-b-20">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="subject" placeholder="Enter Your Subject" value="{{ old('subject') }}">
                  </div>
                  <p><h6>Message</h6></p>
                  <textarea name="mail_message" class="form-control my-editor">{!! old('mail_message') !!}</textarea>
                  <br>
                  <div class="w-size25">
                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                      Send
                    </button>
                  </div>
             </form>
        </div>
    </div>
</div>
@include('partials.tinymce')

<!-- ======================= -->


@endsection
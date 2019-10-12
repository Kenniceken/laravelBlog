@extends('layouts.app')
@include('partials.meta_static')
@section('content')
<div class="container" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="leave-comment">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="bo12 of-hidden col-md-6">
                                <input id="email" type="email" class="sizefull s-text7 p-l-18 p-r-18 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="bo12 of-hidden col-md-6">
                                <input id="password" type="password" class="sizefull s-text7 p-l-18 p-r-18 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary rounded-0">
                                  <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================== -->
<!-- <div class="container" style="min-height: 500px;">
    <div class="row justify-content-center">
        <div class="col-md-5 mx-auto">
           <form action="{{ route('login') }}" method="POST" class="leave-comment">
              <h4 class="m-text26 p-b-36 p-t-15">
                {{ __('Login') }}
              </h4>
                  @csrf
                  <div class="bo4 of-hidden size15 m-b-20">
                    <input 
                        class="sizefull s-text7 p-l-22 p-r-22 @error('email') is-invalid @enderror" 
                        type="email" 
                        id="email" 
                        placeholder="{{ __('Email') }}"
                        name="email" 
                        value="{{ old('email') }}"
                        required 
                        autocomplete="email" 
                        autofocus
                        >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                  <div class="bo4 of-hidden size15 m-b-20">
                    <input 
                        class="sizefull s-text7 p-l-22 p-r-22 @error('password') is-invalid @enderror" 
                        type="password" 
                        id="password" 
                        name="pasword" 
                        placeholder="{{ __('Password') }}" 
                        required 
                        autocomplete="current-password"
                        >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>

                   <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                  <div class="w-size25">
                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                      <i class="fas fa-sign-in-alt"></i> &nbsp; &nbsp;{{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            <small>{{ __('Forgot Your Password?') }}</small>
                        </a>
                    @endif
                  </div>
             </form>
        </div>
    </div>
</div> -->
@endsection

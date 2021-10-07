 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blogs') }}"> 
                                 Blogs 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>                                
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;">   
                                <img src="/images/avatars/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;" />                             
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user() && Auth::user()->role_id === 1)
                                        <a class="dropdown-item" href="{{ route('dashboard') }}"> 
                                           <i class="fas fa-user"></i> Super Admin
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.profile') }}"> 
                                           <i class="fas fa-user"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('blogs') }}"> 
                                         <i class="fas fa-blog"></i> Blogs <span class="badge-notification mt-5" data-badge="{{ $blogs->count() }}"></span>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}"> 
                                           <i class="fas fa-list"></i> Categories
                                        </a>
                                        <a class="dropdown-item" href="{{ route('categories.create') }}"> 
                                           <i class="fas fa-th"></i> Create Category
                                        </a>
                                        @elseif(Auth::user() && Auth::user()->role_id === 2)
                                        <a class="dropdown-item" href="{{ route('dashboard') }}"> 
                                           <i class="fas fa-user"></i> Admin
                                        </a>    
                                        <a class="dropdown-item" href="{{ route('users.profile') }}"> 
                                           <i class="fas fa-user"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('blogs') }}"> 
                                         <i class="fas fa-blog"></i> Blogs <span class="badge-notification mt-5" data-badge="{{ $blogs->count() }}"></span>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}"> 
                                           <i class="fas fa-th"></i> Categories
                                        </a>                                    
                                        <a class="dropdown-item" href="{{ route('categories.create') }}"> 
                                           <i class="fas fa-th"></i> Create Category
                                        </a>
                                        @elseif(Auth::user() && Auth::user()->role_id === 3)
                                        <a class="dropdown-item" href="{{ route('dashboard') }}"> 
                                           <i class="fas fa-user"></i> Author
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.profile') }}"> 
                                           <i class="fas fa-user"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('blogs') }}"> 
                                         <i class="fas fa-blog"></i> Blogs 
                                        </a>
                                        @elseif(Auth::user() && Auth::user()->role_id === 4)
                                        <a class="dropdown-item" href="{{ route('dashboard') }}"> 
                                            <i class="fas fa-user"></i> {{ Auth::user()->role->name }} 
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.profile') }}"> 
                                           <i class="fas fa-user"></i> Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('blogs') }}"> 
                                         <i class="fas fa-blog"></i> Blogs 
                                        </a>
                                       @endif
                                    <a class="dropdown-item" href="{{ route('blogs.create') }}"> 
                                       <i class="fas fa-blog"></i> Create Blog
                                    </a>
                                    <a class="dropdown-item" href="{{ route('categories.create') }}"> 
                                       <i class="fas fa-th"></i> Create Category
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i>   {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
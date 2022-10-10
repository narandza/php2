<body>


<div id="page">
    <nav class="colorlib-nav" role="navigation">

        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div id="colorlib-logo"><a href="{{route('home')}}">TravelBlog</a></div>
                    </div>
                    <div class="col-md-10 text-right menu-1">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="has-dropdown">
                                <a href="{{route('categories.index')}}">Destinations</a>
                                <ul class="dropdown">
                                    @foreach($navbar_categories as $category)
                                    <li><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></li>
                                    @endforeach()
                                </ul>
                            </li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('contact.create')}}">Contact</a></li>
                            <li><a href="{{route('author')}}">Author|Documentation</a></li>
                            @guest()
                            <li class="btn-cta"><a href="{{route('login')}}"><span>Sign in</span></a></li>
                                <li class="btn-cta"><a href="{{route('register')}}"><span>Register</span></a></li>
                            @endguest

                            @auth()
                                @if(auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'editor')
                                    <li class="btn-cta"><a href="{{route('admin.index')}}"><span>Admin Dashboard</span> </a></li>
                                @endif
                                <li class="has-dropdown">
                                    <a href="#">{{auth()->user()->name}} <span class="caret"></span></a>
                                    <ul class="dropdown">
                                        <li>
                                            <a onclick="event.preventDefault();document.getElementById('nav-logout-form').submit()"
                                               href="">Logout</a>
                                            <form id="nav-logout-form" action="{{route('logout')}}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">

            </ul>
        </div>
    </aside>

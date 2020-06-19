

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                    <li><a href="/autocomplete">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        
                        <li><a href="{{ route('cclogin') }}">Login</a></li>
                        <li><a href="{{ route('category') }}">Register</a></li>
                         <li></li>
                        <form action="/search/searchproducts" method="post" class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" name="productName" id="productName" placeholder="Search" aria-label="Search" style="margin-top:0vh;margin-bottom:2vh;" autocomplete="off">
                          {{ csrf_field() }}
                          <button class="btn btn-outline-success my-2 my-sm-0" style="margin-top:0vh;margin-bottom:2vh;" type="submit" name="search">Search</button>
                        </form>
                        <script>//window.location.href="/cclogin"</script>
                    @else

                    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="product_list" class="products" style="position: absolute;margin-top: 0.1%;"></div>

@yield('script')

<script src="{{ asset('js/app.js') }}"></script>

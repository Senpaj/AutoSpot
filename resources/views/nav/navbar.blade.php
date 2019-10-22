<nav class="navbar navbar-inverse navbar-expand-lg bg-light">
            <a class="navbar-brand" href="{{route('/')}}">{{ config('app.name') }}</a>
 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <form class="form-inline my-2 my-lg-0">
                        @if(Auth::guard('admin')->check())
                        <li class="nav-item" style="list-style: none;">
                                <a class="form-control mr-sm-5" style="text-decoration: none;" href="{{route('admin.dashboard')}}"> Administratoriaus langas </a>
                        </li>
                        @endif
                @if (Auth::guest())
                    <a class="form-control mr-sm-2" href="{{route('login')}}"> Prisijungti </a>
		            <a class="form-control mr-sm-2" href="{{route('register')}}"> Registruotis </a>
                @else
                    
                    <li class="nav-item" style="list-style: none;">
                        <a class="form-control mr-sm-5" style="text-decoration: none;" href="{{route('neworder')}}"> Naujas skelbimas </a>
                    </li>
                    <li class="nav-item dropdown" style="list-style: none;">
                        <a class="dropdown-toggle" id="dropdown04" style="color: black;" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->Name}} </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Profilis</a>
                            <a class="dropdown-item" href="{{route('myorders')}}">Mano skelbimai</a>
                            <a class="dropdown-item" href="#">Keisti slaptažodį</a>
                            @if(Auth::guard('admin')->check())
                                <a class="dropdown-item" href="{{route('admin.logout')}}">Atsijungti</a>
                            @else
                                <a class="dropdown-item" href="{{route('user.logout')}}">Atsijungti</a>
                            @endif
                            <a class="dropdown-item" href="{{route('home')}}">Pagrindinis</a>
                        </div>
				    </li>
                @endif
            </form>
            </div>
</nav>
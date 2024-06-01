<nav class="navbar navbar-expand-lg bg-primary border-bottom border-bottom-primary bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav d-flex gap-4">
                @guest()
                    <li class="nav-item">
                        <a class=" {{ (Route::is('login'))? 'active text-primary bg-white rounded' : ''}}   nav-link  active" aria-current="page" href="{{route('login')}}">  Login  </a>
                    </li>
                    <li class="nav-item">
                        <a class=" {{ (Route::is('register'))? ' text-primary bg-white rounded' : ''}}  nav-link" href="{{route('register')}}">Register</a>
                    </li>
                @endguest
                @auth()
                    <li class="nav-item">
                        <a class=" {{ (Route::is(['users.show','users.edit']))? ' text-primary bg-white rounded' : ''}} nav-link" href="{{route('users.show', Auth::user()->id)}}">{{Auth::user()->name}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">@csrf
                        <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>



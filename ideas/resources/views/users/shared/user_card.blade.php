<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                     src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$user->name}}" alt="{{$user->name}} Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{$user->name}}
                        </a></h3>
                    <span class="fs-6 text-muted">@ {{$user->name}}</span>
                </div>
            </div>
            <div>
                @auth()
                    @can('users.edit')
                        <a href="{{route('users.edit', $user->id)}}">Edit</a>
                    @endcan
                @endauth
            </div>
        </div>

        <div class="px-2 mt-4">
            @if($user->bio != '')
                <h5 class="fs-5"> About : </h5>
                <p class="fs-6 fw-light">{{$user->bio}}</p>
            @endif
                @include('users.shared.user_stats')
            @auth()
                @if(Auth::id() !== $user->id)
                    <div class="mt-3 mb-2">
                        @if(Auth::user()->follows($user))
                            <form action="{{route('users.unfollow', $user->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> Unfollow</button>
                            </form>
                        @else
                            <form action="{{route('users.follow', $user->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow</button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>

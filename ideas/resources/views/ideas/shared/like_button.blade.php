<div>
        @if(Auth::check() &&Auth::user()->id !== $idea->user_id)
            @if(Auth::user()->likesIdea($idea))
                <form action="{{route('idea.unlike', $idea->id)}}" , method="post">
                    @csrf
                    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{$idea->likes_count}} </button>
                </form>
            @else
                <form action="{{route('idea.like', $idea->id)}}" , method="post">
                    @csrf
                    <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{$idea->likes_count}} </button>
                </form>
            @endif
        @else
            <a  class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{$idea->likes_count}} </a>
        @endif
</div>

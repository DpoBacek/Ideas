@error('content_'. $idea->id)@include('shared.error')@enderror
<div>
    <form action="{{route("idea.comments.store", $idea->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content_{{$idea->id}}" class="fs-6 form-control" rows="1"></textarea>
            @error('content_'. $idea->id)
            <span class="d-block text-danger mt-2">{{$message}}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment</button>
        </div>
    </form>
    @if(count($idea->comments) > 0)
        <hr>
        <button class=" w-100 btn mb-2 " type="button" data-bs-toggle="collapse" data-bs-target="#{{$idea->id}}"
                aria-expanded="false" aria-controls="collapseExample">
            <h6 class="text-primary"> Show all comments </h6>
        </button>
        <div class="collapse" id="{{$idea->id}}">
            <div class="card card-body">
                @foreach($idea->comments as $comment )
                    <div class="d-flex align-items-start">
                        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                             src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$comment->user->name}}"
                             alt="{{$comment->user->name}} Avatar">
                        <div class="w-100">
                            <div class="d-flex  justify-content-between">
                                <a href="{{route('users.show',$comment->user->id)}}"><h6
                                        class="">{{$comment->user->name}}</h6></a>
                                <div style="display:grid; grid-template-columns: 1fr 30px; gap: 20px">
                                    <small class="fs-6 fw-light text-muted"> {{$comment->created_at->diffForHumans()}} </small>
                                    @can('comment.destroy', $comment)
                                        <form method="post"
                                              action="{{route('idea.comments.destroy', ['idea' => $comment->idea_id, 'id' => $comment->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="mt-1 btn btn-danger btn-sm">x</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                            <p class="fs-6 mt-1 fw-light">
                                {{$comment->content}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>



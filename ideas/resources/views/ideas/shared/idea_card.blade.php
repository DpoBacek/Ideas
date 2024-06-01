<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                         src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$idea->user->name}}"
                         alt="{{$idea->user->name}} Avatar">
                    <div>
                        <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}
                            </a></h5>
                    </div>
                </div>
                <div>

                    <form method="post" action="{{route('idea.destroy', $idea->id)}}">
                        @csrf
                        @method('delete')
                        @can('idea.edit',$idea)
                            <a class="mt-2" href="{{route('idea.edit', $idea->id)}}">Edit</a>
                        @endcan
                        <a href="{{route('idea.show', $idea->id)}}">View</a>
                        @can('idea.destroy',$idea)
                            <button class="mt-1 btn btn-danger btn-sm">x</button>
                        @endcan
                    </form>

                </div>
            </div>
        </div>

        <div class="card-body">
            @if($editing ?? false)
                <form action="{{route('idea.update', $idea->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="idea" class="form-control" id="idea" rows="3">{{$idea->idea}}</textarea>
                        @error('idea')
                        <span class="d-block text-danger mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary mb-2 btn-sm"> Update</button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{$idea->idea}}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                    @include('ideas.shared.like_button')
                <div>
                    <span class="fs-6 fw-light text-muted "> <span class="fas fa-clock m-sm-2 "> </span>{{$idea->created_at->diffForHumans()}} </span>
                </div>
            </div>
            @include('shared.comments_box')
        </div>
    </div>
</div>

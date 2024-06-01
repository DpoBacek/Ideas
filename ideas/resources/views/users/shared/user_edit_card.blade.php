<div class="card">

    <div class="px-3 pt-4 pb-2">
        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                         src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$user->name}}"
                         alt="{{$user->name}} Avatar">
                    <div>
                        <input name="name" value="{{$user->name}}" type="text" class="form-control">
                        @error('name')
                        <span class="d-block text-danger fs-6">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth()
                        @can('users.edit')
                            <a href="{{route('users.show',$user->id)}}">View</a>
                        @endcan
                    @endauth
                </div>
            </div>

            <div class="mt-4">
                <label for="">Profile picture</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                <span class="d-block text-danger fs-6">{{$message}}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3"> {{$user->bio}} </textarea>
                    @error('bio')
                    <span class="d-block text-danger fs-6">{{$message}}</span>
                    @enderror
                </div>
                <button class="btn btn-sm btn-primary mb-3 ">Save</button>
                @include('users.shared.user_stats')
            </div>
        </form>
    </div>
</div>
<hr>

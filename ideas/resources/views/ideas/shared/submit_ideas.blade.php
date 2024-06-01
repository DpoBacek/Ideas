@auth()
    @error('idea')@include('shared.error')@enderror
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{route('idea.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="idea" class="form-control" id="idea" rows="3"></textarea>
                @error('idea')
                <span class="d-block text-danger mt-2">{{$message}}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary"> Share</button>
            </div>
        </form>
    </div>
@endauth
@guest()
    <h4>Login to share yours ideas </h4>
@endguest

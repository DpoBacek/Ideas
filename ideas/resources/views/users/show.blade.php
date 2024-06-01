@extends('layout.app')

@section('title', $user->name)

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left_sidebar')
            </div>

            <div class="col-6">
                @include('shared.successfully')
                <div class="mt-3">
                    @include('users.shared.user_card')
                </div>

                @if(count($ideas) >0)
                    @foreach($ideas as $idea)
                        @include('ideas.shared.idea_card')
                    @endforeach
                @else
                    <h3 class="text-center my-3">No results found.</h3>
                @endif

                <div class="mt-3">
                    {{$ideas->withQueryString()->links()}}
                </div>
            </div>
            <div class="col-3">
                @include('shared.search_bar')
                @include('shared.follow_box')
            </div>
        </div>
@endsection

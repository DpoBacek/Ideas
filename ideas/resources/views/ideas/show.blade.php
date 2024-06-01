@extends('layout.app')

@section('title', 'View Idea')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left_sidebar')
            </div>

            <div class="col-6">
                @include('shared.successfully')
                @include('ideas.shared.idea_card')

            </div>
            <div class="col-3">
                @include('shared.search_bar')
                @include('shared.follow_box')
            </div>
        </div>
@endsection

@extends('layout.app')

@section('title', 'Terms')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">
            @include('shared.successfully')
            <div class="container py-4">
                <div class="card overflow-hidden">
                    <div class="card-body pt-3">
                        <h2>Terms</h2>
                        <div>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of
                            type and
                            scrambled it to make a type specimen book. It has survived not only five centuries, but also
                            the
                            leap
                            into electronic typesetting, remaining essentially unchanged. It was popularised in the
                            1960s
                            with the
                            release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing
                            software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <div class="card-footer text-center py-2 mt-2">
                            <a class="btn btn-link btn-sm" href="{{url()->previous()}}">Go back </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
        @endsection
    </div>

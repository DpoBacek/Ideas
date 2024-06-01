@extends('layout.app')

@section('title', 'Snake')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>

        <div class="col-6">
            @include('shared.successfully')
            <center>
                <div id="game">
                    <canvas id="gameCanvas" width="400" height="400"></canvas>
                    <div id="score">Score: 0</div>
                    <button class="btn btn-primary" onclick="main()" id="startButton">Start Game</button>
                    <!-- Кнопка начала игры -->
                </div>
            </center>
            <script src="{{ asset('js/app.js') }}"></script>
        </div>

        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection

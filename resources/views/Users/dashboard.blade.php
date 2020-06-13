@extends('Users.layout')

@section('title', 'Dashboard')

@section('content')

<div class="row m-2">
    <div class="col">
        <div class="card p-3">
            <div class="intro text-center">
                <h3 class="text-white">WELCOME {{ Auth::user()->fname }} </h3>
            </div>
            <div class="row">
                <div class="col">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

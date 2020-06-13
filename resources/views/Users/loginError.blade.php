@extends('Users.error')

@section('content')

<div class="login-error h-100 d-flex justify-content-center align-items-center">
    <h3 class="text-white">Your login data is incorrect</h3>
    <a class="btn tryBtn" href="{{url('/')}}">Try again</a>
</div>

@endsection

@extends('Users.layout')

@section('title', 'profile')

@section('content')

<div class="row m-2">
    <div class="col">
        <div class="card p-3">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{ $user->id }}</td>
                        <td scope="row">{{ $user->fname }}</td>
                        <td scope="row">{{ $user->lname }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td scope="row">{{ $user->role }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

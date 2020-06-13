@extends('../Users.layout')

@section('title', 'Operations')

@section('content')

<div class="row m-2">
    <div class="col">
        <div class="card p-3">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        @if(Auth::user()->role == 'it')
                            <th>Edit</th>
                            <th>Delete</th>
                        @endif
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td scope="row">{{ $user->id }}</td>
                            <td scope="row">{{ $user->fname }}</td>
                            <td scope="row">{{ $user->email }}</td>
                            <td scope="row">{{ $user->role }}</td>
                            @if(Auth::user()->role == 'it')
                                <td scope="row">
                                    <a class="btn btn-warning py-0" href="{{ url('/users/edit', $user->id) }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <a class="btn btn-danger py-0" href="{{ url('/users/delete', $user->id) }}" onclick="return confirm('Are you sure you want to delete {{ $user->email }} ?')">Delete</a>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @if(Auth::user()->role == 'it')
                <div class="create text-center">
                    <a class="btn" href="{{ url('/users/register') }}">Create</a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

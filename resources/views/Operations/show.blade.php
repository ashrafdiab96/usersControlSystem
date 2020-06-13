@extends('../Users.layout')

@section('title', 'Operations')

@section('content')

<div class="row m-2">
    <div class="col">
        <div class="card p-3">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th>Operation</th>
                        <th>Type</th>
                        <th>Technology</th>
                        @if (Auth::user()->role == 'owner' || Auth::user()->role == 'operation')
                            <th>Edit</th>
                            <th>Delete</th>
                        @endif
                    </tr>
                </thead>
                @foreach($ops as $op)
                    <tbody>
                        <tr>
                            <td scope="row">{{ $op->operation }}</td>
                            <td scope="row">{{ $op->type }}</td>
                            <td scope="row">{{ $op->tech }}</td>
                            @if (Auth::user()->role == 'owner' || Auth::user()->role == 'operation')
                                <td scope="row">
                                    <a class="btn btn-warning py-0" href="{{ url('/operations/edit', $op->id) }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <a class="btn btn-danger py-0" href="{{ url('/operations/delete', $op->id) }}" onclick="return confirm('Are you sure you want to delete {{ $op->operation }} ?')">Delete</a>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @if (Auth::user()->role == 'owner' || Auth::user()->role == 'operation')
                <div class="create text-center">
                    <a class="btn" href="{{ url('/operations/create') }}">Create</a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

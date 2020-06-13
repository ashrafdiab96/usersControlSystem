@extends('../Users.layout')

@section('title', 'Operations')

@section('content')

<div class="row m-2">
    <div class="col">
        <div class="card p-3">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Technology</th>
                        <th>Cost</th>
                        @if(Auth::user()->role == 'owner' || Auth::user()->role == 'finance')
                            <th>Edit</th>
                            <th>Delete</th>
                        @endif
                    </tr>
                </thead>
                @foreach($finance as $fi)
                    <tbody>
                        <tr>
                            <td scope="row">{{ $fi->project }}</td>
                            <td scope="row">{{ $fi->tech }}</td>
                            <td scope="row">{{ $fi->cost }}</td>
                            @if(Auth::user()->role == 'owner' || Auth::user()->role == 'finance')
                                <td scope="row">
                                    <a class="btn btn-warning py-0" href="{{ url('/finance/edit', $fi->id) }}">Edit</a>
                                </td>
                                <td scope="row">
                                    <a class="btn btn-danger py-0" href="{{ url('/finance/delete', $fi->id) }}" onclick="return confirm('Are you sure you want to delete {{ $fi->project }} ?')">Delete</a>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table>
            @if(Auth::user()->role == 'owner' || Auth::user()->role == 'finance')
                <div class="create text-center">
                    <a class="btn" href="{{ url('/finance/create') }}">Create</a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

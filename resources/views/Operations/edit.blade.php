@extends('../Users.layout')

@section('title', 'profile')

@section('content')

        <div class="container h-100 d-flex justify-content-center">
            <div class="row h-100 w-50">
                <div class="col h-100">
                    <form class="h-100 myForm d-flex justify-content-center align-items-center" method="POST" action="{{ url('/operations/update', $op->id) }}">
                        @csrf
                        <div class="container card form-container p-5">
                            <div class="row mb-5">
                                <div class="col text-center">
                                    <h3 class="text-white">Edit Operation</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="op" value="{{ $op->operation }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="type" value="{{ $op->type }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="tech" value="{{ $op->tech }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group text-center mt-3">
                                        <button type="submit" class="btn px-4">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endsection

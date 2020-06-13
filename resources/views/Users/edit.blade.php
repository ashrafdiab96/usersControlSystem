@extends('Users.layout')

@section('title', 'Edit User')

@section('content')

        <div class="container h-100 d-flex justify-content-center">
            <div class="row h-100 w-50">
                <div class="col h-100">
                    <form class="h-100 myForm d-flex justify-content-center align-items-center" method="POST" action="{{ url('/users/update', $user->id) }}">
                        @csrf
                        <div class="container card form-container p-5">
                            <div class="row mb-5">
                                <div class="col text-center">
                                    <h3 class="text-white">Edit Finance</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="project" value="{{ $user->fname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="tech" value="{{ $user->lname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="cost" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select name="role" class="form-control">
                                            <option value="owner">Owner</option>
                                            <option value="it">IT</option>
                                            <option value="operation">Operation</option>
                                            <option value="finance">Finance</option>
                                        </select>
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

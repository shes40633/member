@extends('layouts.app')


@section('css')

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">change</div>

                <form method="post" action="/v1/user/update/{{$items ->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name"  value="{{$items ->name}}"name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Account" class="col-sm-2 col-form-label">Account</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Account"  value="{{$items ->Account}}" name="Account">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="Password"  value="{{$items ->Password}}" name="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

@endsection


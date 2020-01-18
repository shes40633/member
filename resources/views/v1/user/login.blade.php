@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/v1/user/login">
                        @csrf

                        <div class="form-group row">
                            <label for="Account" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Account') }}</label>

                            <div class="col-md-6">
                                <input id="Account" type="email" class="form-control @error('Account') is-invalid @enderror" name="Account" value="{{ old('Account') }}" required autocomplete="Account" autofocus>

                                @error('Account')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="Password" type="password" class="form-control @error('Password') is-invalid @enderror" name="Password" required autocomplete="current-password">

                                @error('Password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

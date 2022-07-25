@extends('frontend.layout.template')
@section('title', 'Login')
@section('content')
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="content-form-page">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-info">
                            <img
                                src="https://i.ibb.co/sR3yCPm/Couple-with-backpacks-walking-outdoors-Tourists-with-Nordic-poles-hiking-in-mountains-flat-vector-il.jpg">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-without-legend" method="POST"
                                        action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-offset-4">
                                                <h1>Login</h1>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-lg-4 control-label">Email <font color="red">*
                                                </font></label>
                                            <div class="col-lg-6">
                                                <input type="email" name="email"
                                                    class="form-control-login @error('email') is-invalid @enderror form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-lg-4 control-label">Password <font color="red">
                                                    *</font>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" name="password"
                                                    class="form-control-login @error('password') is-invalid @enderror form-control-user"
                                                    id="exampleInputPassword">
                                                @error('password')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-offset-4">
                                                <a href="{{ route('password.request') }}" class="btn-link">Lupa
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-offset-4">
                                                <button type="submit" class="btn btn-success btn-round">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

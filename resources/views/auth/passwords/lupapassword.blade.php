@extends('frontend.layout.template')
@section('title', 'Lupa Password')
@section('content')
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="content-form-page">
                <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="form-info">
                            <img
                                src="https://i.ibb.co/sR3yCPm/Couple-with-backpacks-walking-outdoors-Tourists-with-Nordic-poles-hiking-in-mountains-flat-vector-il.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form class="form-horizontal form-without-legend" method="POST"
                                        action="{{ route('password.email') }}">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-offset-4">
                                                <h3>Lupa Password</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-lg-4 control-label">Email <font color="red">*
                                                </font></label>
                                            <div class="col-lg-6">
                                                <input type="email" name="email"
                                                    class="form-control-login  @error('email') is-invalid @enderror form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-offset-4">
                                                <button type="submit" class="btn btn-success">Verifikasi</button>
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

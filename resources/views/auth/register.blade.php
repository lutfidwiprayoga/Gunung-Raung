@extends('frontend.layout.template')
@section('title', 'Daftar')
@section('content')
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="content-form-page">
                <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="form-info">
                            <img src="https://i.ibb.co/7ydfw35/Tourists-man-and-woman-hiking-in-mountains-with-map.png">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <form class="form-horizontal form-without-legend" method="POST"
                                        action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-offset-4">
                                                <h1>Daftar</h1>
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
                                            <label for="" class="col-lg-4 control-label">Pilih Pengguna <font color="red">*
                                                </font>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="level"
                                                    class="form-control-login @error('level') is-invalid @enderror"
                                                    id="exampleFormControlSelect" value="{{ old('level') }}" required
                                                    autocomplete="level">
                                                    <option value="">Pilih Pengguna</option>
                                                    <option value="guide">Guide</option>
                                                    <option value="wisatawan">Wisatawan</option>
                                                </select>
                                                @error('level')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-lg-4 control-label">Nama Lengkap<font color="red">*
                                                </font>
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="name" type="text"
                                                    class="form-control-login @error('name') is-invalid @enderror form-control-user"
                                                    id="name" value="{{ old('name') }}" required autocomplete="name">
                                                @error('name')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="col-lg-4 control-label">Username <font color="red">
                                                    *</font>
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="username" type="text"
                                                    class="form-control-login @error('username') is-invalid @enderror form-control-user"
                                                    id="username" value="{{ old('username') }}" required
                                                    autocomplete="username">
                                                @error('username')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
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
                                            <label for="password_confirmation" class="col-lg-4 control-label"> Konfirmasi
                                                Password <font color="red">*</font></label>
                                            <div class="col-lg-6">
                                                <input type="password" name="password_confirmation"
                                                    class="form-control-login @error('password') is-invalid @enderror form-control-user"
                                                    id="exampleInputPassword">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4 col-sm-offset-4">
                                                <button type="submit" class="btn btn-success">DAFTAR</button>
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

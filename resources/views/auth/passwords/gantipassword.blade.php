@extends('database.layout.adm_admin')
@section('title', 'Ganti-Password')

@section('contentadmin')
    <div class="container-fluid">
        <div class="panel-body">
            @if (session('error'))
                <div class="alert alert-icon alert-success alert-dismissable fade-in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="mdi mdi-check-all"></i>
                    <strong>Perhatian!!</strong>{{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.ganti') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror form-control-user"
                                id="current_password" aria-describedby="emailHelp" placeholder="Password Lama">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror form-control-user"
                                id="new_password" placeholder="Password Baru">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control form-control-user"
                                id="password_confirmation" placeholder="Konfirmasi Password Baru">
                        </div>

                        <div class="form group">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Update Password
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

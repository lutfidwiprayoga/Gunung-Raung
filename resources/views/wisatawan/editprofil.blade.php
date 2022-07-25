@extends('frontend.layout.template')

@section('title', 'Setting')

@section('content')
    <div class="checkout_area section-padding-80">
        <div class="container">
            @if (session('successData'))
                <div class="alert alert-icon alert-success alert-dismissable fade-in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="mdi mdi-check-all"></i>
                    <strong>!!</strong>{{ session('successData') }}
                </div>
            @endif
            <div class="row">
                <!--Profile View-->
                <div class="col-12 col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="profile-username text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('foto_profil/' . Auth::user()->foto) }}"><br>
                                <h3 class="profile-name">{{ auth()->user()->name }}</h3>
                                <h4 class="profile-level">{{ auth()->user()->level }}</h4>
                            </div>
                            <div class="profile-info">
                                <h4 class="text-center">Contact Information</h4>
                                <ul>
                                    <li>
                                        <span>Username :</span>
                                        <p class="profil-info-field">{{ auth()->user()->username }}</p>
                                    </li>
                                    <li>
                                        <span>Email Address :</span>
                                        <p>{{ auth()->user()->email }}</p>
                                    </li>
                                    <li>
                                        <span>Jenis Kelamin :</span>
                                        <p class="profil-info-field">{{ auth()->user()->jenis_kelamin }}</p>
                                    </li>
                                    <li>
                                        <span>No HP :</span>
                                        <p>{{ auth()->user()->no_hp }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Edit Profil & Ganti Password-->
                <div class="col-12 col-md-8">
                    <div class="card-light">
                        <div class="card-body">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profil1" role="tabpanel1"
                                        aria-selected="false">Edit Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profil2" role="tabpanel2"
                                        aria-selected="false">Ganti Password</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!--Edit Prodfil-->
                                <div class="tab-pane fade" id="profil1" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="checkout_details_area clearfix">
                                            <form class="form-horizontal form-without-legend"
                                                action="{{ route('profil.update') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="name">Nama Lengkap<font color="red">*</font></label>
                                                        <input type="text"
                                                            class="form-control-profile @error('name') is-invalid @enderror"
                                                            name="name" id="name" value="{{ $user->name }}" required>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username<font color="red">*</font></label>
                                                        <input type="text"
                                                            class="form-control-profile @error('username') is-invalid @enderror"
                                                            name="username" id="username" value="{{ $user->username }}"
                                                            required>
                                                        @error('username')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email<font color="red">*</font></label>
                                                        <input type="email"
                                                            class="form-control-profile @error('email') is-invalid @enderror"
                                                            name="email" id="email" value="{{ $user->email }}" required>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto">Upload Foto Profil<font color="red">*</font>
                                                        </label>
                                                        <input type="file"
                                                            class="form-control-profile-foto @error('foto') is-invalid @enderror"
                                                            name="foto" id="foto" value="{{ old('foto') }}" required>
                                                        @error('foto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_kelamin">Jenis Kelamin<font color="red">*</font>
                                                        </label>
                                                        <select name="jenis_kelamin"
                                                            class="form-control-profile @error('jenis_kelamin') is-invalid @enderror">
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        <div class="text-danger">
                                                            @error('jenis_kelamin')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">No HP<font color="red">*</font></label>
                                                        <input type="number"
                                                            class="form-control-profile @error('no_hp') is-invalid @enderror"
                                                            name="no_hp" id="no_hp" value="{{ $user->no_hp }}" required>
                                                        @error('no_hp')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--ganti Password-->
                                <div class="tab-pane fade" id="profil2" role="tabpanel2">
                                    <div class="pd-20">
                                        <div class="checkout_details_area mt-50 clearfix">
                                            <form class="form-horizontal form-without-legend"
                                                action="{{ route('password.ganti') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="current_password">Password<font color="red">*</font>
                                                        </label>
                                                        <input type="password"
                                                            class="form-control-profile @error('current_password') is-invalid @enderror"
                                                            name="current_password" id="current_password"
                                                            value="{{ old('current_password') }}" required>
                                                        @error('current_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password<font color="red">*</font></label>
                                                        <input type="password"
                                                            class="form-control-profile @error('password') is-invalid @enderror"
                                                            name="password" id="password" value="{{ old('password') }}"
                                                            required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password_confirmation">Konfirmasi
                                                            Password<font color="red">*</font></label>
                                                        <input type="password"
                                                            class="form-control-profile @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" id="password_confirmation"
                                                            value="{{ old('password_confirmation') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-sm">Update
                                                            Password</button>
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
        </div>
    </div>
@endsection

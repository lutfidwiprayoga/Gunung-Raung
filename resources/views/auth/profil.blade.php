@extends('admin.layout.template')
@section('title', 'Profil')

@section('contentadmin')

    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Setting Profile</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Profil</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Setting</a>
                </li>
            </ul>
        </div>
        @if (session('success'))
            <div class="alert alert-icon alert-success alert-dismissable fade-in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-check-all"></i>
                <strong>!!</strong>{{ session('success') }}
            </div>
        @endif
        <div class="row">
            {{-- My Profil --}}
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 media align-items-center">
                            <img class="mr-3 " src="{{ asset('foto_profil/' . $user->foto) }}" width="60"
                                height="80" alt="">
                            <div class=" media-body">
                                <h3 class="mb-0">{{ auth()->user()->name }}</h3>
                                <p class="mb-0 text-muted">
                                    @if (auth()->user()->level == 'admin')
                                        Admin
                                    @elseif (auth()->user()->level == 'guide')
                                        Guide
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="mb-5 row">
                            <div class="col">
                                <div class="text-center card card-profile">
                                    <span class="mb-1 text-primary"><i class="fas fa-user-friends"></i></span>
                                    <h3 class="mb-0">263</h3>
                                    <p class="px-4 text-muted">Following</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center card card-profile">
                                    <span class="mb-1 text-warning"><i class="fas fa-user-plus"></i></span>
                                    <h3 class="mb-0">263</h3>
                                    <p class="text-muted">Followers</p>
                                </div>
                            </div>
                            <div class="text-center col-12">
                                <button class="px-5 btn btn-danger">Follow Now</button>
                            </div>
                        </div>

                        <h4>About Me</h4>
                        <p class="text-muted">Hi, I'm {{ auth()->user()->name }}, has been the industry standard dummy
                            text ever since the
                            1500s.</p>
                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="mr-4 text-dark">No Hp</strong>
                                <span>{{ auth()->user()->no_hp }}</span>
                            </li>
                            <li><strong class="mr-4 text-dark">Email</strong> <span>{{ auth()->user()->email }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Edit Profil</h3>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" class="form-control @error('username') is-invalid @enderror"
                                            value="{{ $user->username }}">
                                        <div class="text-danger">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input name="name" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $user->name }}">
                                        <div class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $user->email }}">
                                        <div class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                            id="exampleFormControlSelect">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        {{-- <input name="jenis_kelamin" class="form-control" value="{{ $wisatawan->jenis_kelamin }}"> --}}
                                        <div class="text-danger">
                                            @error('jenis_kelamin')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="number" name="no_hp"
                                            class="form-control @error('no_hp') is-invalid @enderror"
                                            value="{{ $user->no_hp }}">
                                        <div class="text-danger">
                                            @error('no_hp')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file" name="foto" class="form-control">
                                        <div class="text-danger">
                                            @error('foto')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Ganti Password --}}
            <div class="col-lg-8 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Ganti Password</h3>
                        <form method="POST" action="{{ route('password.ganti') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
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
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-user" id="password_confirmation"
                                            placeholder="Konfirmasi Password Baru">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Ganti Password --}}
        </div>
    </div>

@endsection

@extends('auth.layouts.app')
@section('judul', 'Verifikasi Email')

@section('konten')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="my-5 border-0 shadow-lg card o-hidden">
                    <div class="p-0 card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6"></div> --}}
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="mb-4 text-gray-900 h4">Verifikasi Email</h1>
                                    </div>
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('Link Verifikasi telah dikirim ke email kamu. Silahkan cek email dan klik "Verifikasi Email" agar bisa melanjutkan proses pendaftaran akun') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Klik disini untuk mengirim email verifikasi
                                        </button>
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

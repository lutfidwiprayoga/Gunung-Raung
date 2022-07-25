@extends('frontend.layout.template')
@section('title', 'Form Pendaftaran - Booking Online Gunung Raung')
@section('content')
    <div class="gtco-container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mengisi Form Pendaftaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <div id="app" class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Pilih Guide -->
                        <div class="pl-sm-4">
                            <div class="row">
                                <h3>Pilih Guide</h3>
                                <div class="contact-directory-list">
                                    <ul class="row">
                                        @foreach ($perjalanan as $index => $data)
                                            <li class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                <div class="contact-directory-box">
                                                    <input @change="changeSelectedIndexGuide('{{ $index }}')"
                                                        data-harga="{{ $data->harga_perjalanan }}"
                                                        class="guide form-check-input" type="radio" name="perjalanan_id"
                                                        id="inlineRadio" value="{{ $data->id }}">
                                                    <div class="text-danger">
                                                        @error('perjalanan_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                    <div class="contact-dire-info text-center">
                                                        <div class="contact-avatar">
                                                            <span>
                                                                <img src="{{ asset('foto_profil/' . $data->user->foto) }}"
                                                                    width="150" height="150">
                                                            </span>
                                                        </div>
                                                        <div class="contact-name">
                                                            <h4>{{ $data->user->name }}</h4>
                                                            <p>{{ $data->nama_paket }}</p>
                                                            <div class="work-text-success">
                                                                <p>Rp.{{ number_format($data->harga_perjalanan) }}/orang
                                                                </p>
                                                                <p>{{ date('D, d M Y', strtotime($data->tanggal_mulai)) }}-{{ date('D, d M Y', strtotime($data->tanggal_selesai)) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="profile-sort-desc">
                                                            {{ $data->keterangan }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Pilih Guide -->
                        {{-- <div class="pl-sm-4">
                            <div class="row">
                                <h3>Pilih Guide</h3>
                                @foreach ($perjalanan as $index => $data)
                                    <div class="col-md-6 col-md-4">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="form-check form-check-inline">
                                                    <input @change="changeSelectedIndexGuide('{{ $index }}')"
                                                        data-harga="{{ $data->harga_perjalanan }}"
                                                        class="guide form-check-input" type="radio" name="perjalanan_id"
                                                        id="inlineRadio" value="{{ $data->id }}">
                                                    <div class="row align-items-center">
                                                        <div class="col-icon">
                                                            <div
                                                                class="text-center icon-big icon-primary bubble-shadow-small">
                                                                <img src="{{ asset('foto_profil/' . $data->user->foto) }}"
                                                                    width="45px">
                                                            </div>
                                                        </div>
                                                        <div class="ml-3 col col-stats ml-sm-0">
                                                            <div class="numbers">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <p class="card-title">
                                                                            {{ $data->user->name }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <a type="button" class="btn-link btn-sm">
                                                                            Rp.{{ number_format($data->harga_perjalanan) }}/orang
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <h4 class="card-category">
                                                                    {{ $data->nama_paket }}
                                                                    {{ date('l, d-m-Y', strtotime($data->jadwal_mulai)) }}
                                                                    -
                                                                    {{ date('l, d-m-Y', strtotime($data->jadwal_selesai)) }}
                                                                </h4>
                                                                <p class="card-category">
                                                                    {{ $data->keterangan }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}
                        <!-- Pilih Tanggal -->
                        <div class="pl-sm-4">
                            <div class=" row">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 style="color: #575962">Jadwal Pendakian</h3>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Pilih Tanggal Naik<font color="red">*
                                                </font>
                                            </label>
                                            <div class="col-sm-4">
                                                <input type="date" id="tanggal-naik"
                                                    class="form-control form-control-alternative"
                                                    data-date-format="dd/mm/yyyy" value="{{ $tanggal_id }}" readonly>
                                                <input type="hidden" name="tanggal_id" value="{{ $id }}">
                                                {{-- <div class="text-danger">
                                                    @error('tanggal_id')
                                                        {{ $message }}
                                                    @enderror
                                                </div> --}}
                                                <p style="font-size: 12px">
                                                    <font color="red">*Maxsimal Pendakian 5 hari</font>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Pilih Tanggal Turun<font color="red">*
                                                </font>
                                            </label>
                                            <div class="col-sm-4">
                                                <input name="tanggal_turun" type="date" id="tanggal-turun"
                                                    class="form-control form-control-alternative"
                                                    data-date-format="dd/mm/yyyy" value="{{ $tanggal_id }}">
                                                <div class="text-danger">
                                                    @error('tanggal_turun')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Ketua Kelompok -->
                        <div class="pl-sm-4">
                            <div class=" row">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 style="color: #575962">Data Ketua Kelompok</h3>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Nama Lengkap<font color="red">*</font>
                                            </label>
                                            <div class="col-sm-10">
                                                <input name="nama[]" type="text" id="input-first-name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ old('nama[]') }}">
                                                <div class="text-danger">
                                                    @error('nama')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Email<font color="red">*</font></label>
                                            <div class="col-sm-10">
                                                <input name="email" type="email"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Pastikan Alamat email anda valid karena konfirmasi pendaftaran akan dikirim ke alamat email ketua kelompok"
                                                    value="{{ old('email') }}">
                                                <div class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="input-username">Tanggal Lahir<font
                                                    color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <input name="tanggal_lahir[]" type="date" id="date-input"
                                                    class="form-control form-control-alternative"
                                                    data-date-format="dd/mm/yyyy" value="{{ old('tanggal_lahir[]') }}">
                                                <div class="text-danger">
                                                    @error('tanggal_lahir')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Jenis Kelamin<font color="red">*</font>
                                            </label>
                                            <div class=" col-sm-4">
                                                <select name="jenis_kelamin[]" class="form-control form-control-alternative"
                                                    value="{{ old('jenis_kelamin[]') }}">
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
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2" for="input-address">Alamat (Sesuai
                                                KTP)<font color="red">*</font></label>
                                            <div class="col-sm-10">
                                                <input class="form-control form-control-alternative" name="alamat[]"
                                                    data-title="Alamat" value="{{ old('alamat[]') }}">
                                                <div class="text-danger">
                                                    @error('alamat')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2" for="input-first-name">Jenis
                                                Identitas<font color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <select name="jenis_identitas[]" class="form-control"
                                                    id="exampleFormControlSelect" value="{{ old('jenis_identitas[]') }}">
                                                    <option value="">-</option>
                                                    <option value="KTP">KTP</option>
                                                    <option value="Kartu Pelajar/KTM">Kartu Pelajar/KTM</option>
                                                    <option value="SIM">SIM</option>
                                                    <option value="Passport">Passport</option>
                                                </select>
                                                <div class="text-danger">
                                                    @error('jenis_identitas')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2" for="input-last-name">Nomor
                                                Kartu Identitas<font color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <input name="nomor_identitas[]" type="text" id="input-last-name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ old('nomor_identitas[]') }}">
                                                <div class="text-danger">
                                                    @error('nomor_identitas')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2" for="input-last-name">Pekerjaan<font
                                                    color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <select name="pekerjaan" class="form-control"
                                                    id="exampleFormControlSelect" value="{{ old('pekerjaan') }}">
                                                    <option value="">Pilih Pekerjaan</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                                <div class="text-danger">
                                                    @error('pekerjaan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2" for="input-first-name">Foto
                                                Kartu Identitas<font color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <input name="foto_identitas" type="file" id="input-first-name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ old('foto_identitas') }}">
                                                <div class="text-danger">
                                                    @error('foto_identitas')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="negara">
                                            <label class="form-control-label col-sm-2" for="negara_id">Kebangsaan<font
                                                    color="red">*
                                                </font></label>
                                            <div class="col-sm-4">
                                                <select name="kebangsaan_id[]" v-model="kebangsaan_ketua"
                                                    class="form-control" id="negara_id"
                                                    value="{{ old('kebangsaan_id[]') }}">
                                                    <option>-</option>
                                                    @foreach ($kebangsaan as $kb)
                                                        <option value="{{ $kb->id }}">{{ $kb->negara }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('kebangsaan_id')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label col-sm-2" for="input-first-name">No Hp<font
                                                    color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <input name="no_hp[]" type="number" id="input-first-name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ old('no_hp[]') }}">
                                                <div class="text-danger">
                                                    @error('no_hp')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="provinsi">
                                            <label class="form-control-label col-sm-2" for="provinsi_id">Provinsi <font
                                                    color="red">
                                                    *
                                                </font></label>
                                            <div class="col-sm-4">
                                                <select name="provinsi" class="form-control" id="provinsi_id"
                                                    value="{{ old('provinsi') }}">
                                                    <option>-</option>
                                                    @foreach ($provinsi as $prov)
                                                        <option value="{{ $prov->province_id }}">{{ $prov->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger">
                                                    @error('provinsi')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="kota">
                                            <label class="form-control-label col-sm-2" for="kota_id">Kabupaten /
                                                Kota<font color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <select name="asal_kota" class="form-control" id="kota_id"
                                                    value="{{ old('asal_kota') }}">
                                                    <option>-</option>
                                                </select>
                                                <div class="text-danger">
                                                    @error('asal_kota')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{-- [[jumlah_anggota]] --}}
                                            <label class="form-control-label col-sm-2" for="input-first-name">Jumlah
                                                Anggota<font color="red">*</font></label>
                                            <div class="col-sm-4">
                                                <select name="" class="form-control" v-on:change="changeAnggotaLength"
                                                    id="">
                                                    <option value="" selected>-</option>
                                                    <option value="1">1</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Data Anggota -->
                        <div class="pl-sm-4">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center"><em>
                                                <font color="red">*</font>Inputkan Data Anggota selain Ketua
                                            </em></h4>
                                        <h3 style="color: #575962">Data Anggota</h3>
                                        <div class="col-md-12">
                                            <div class="card-table">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <div id="add-row_wrapper"
                                                            class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table-component>
                                                                        <anggota-input-component :anggota="anggota"
                                                                            :index="index"
                                                                            v-for="(item, index) in parseInt(jumlah_anggota)">
                                                                        </anggota-input-component>
                                                                    </table-component>
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
                        </div>
                        <!-- Checkout  -->
                        <div class="pl-sm-4">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Konfirmasi Pendaftaran</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ url('template_cube') }}/images/hargatiket.svg"
                                                    style="width: 95%; padding-left: 15px;">
                                            </div>
                                            <div style="padding: 5px;"></div>
                                            <div class="col-sm-6">
                                                <div class="cnt-booking-detail">
                                                    <div style="padding-bottom: 10px; padding-left: 15px; font-size: 18px;">
                                                        Rincian
                                                        Booking
                                                        Online Anda terdiri dari :</div>
                                                    <div>
                                                        <div style="padding-bottom: 10px; padding-left: 15px;">
                                                            <span id="tanggal"></span>
                                                        </div>
                                                        <div style="padding-left: 15px;">[[jumlah_wni]] WNI X Rp.
                                                            [[total_harga_wni]]</div>
                                                        <div style="padding-left: 15px;">[[jumlah_wna]] WNA X Rp.
                                                            [[total_harga_wna]]</div>
                                                    </div>
                                                </div>
                                                <div class="cnt-booking-total pl-15">
                                                    <div style="padding-bottom: 10px; padding-left: 15px;">
                                                        <div style="font-weight: 700;">Guide</div>
                                                        <div>1 Guide X Rp. [[harga_guide]]</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div style="font-weight: 700; color: #15a585; padding-left: 15px"
                                                    id="totalHarga">
                                                    Total
                                                    biaya untuk pendaftaran anda sebesar Rp. [[total_bayar]] </div>
                                                <input type="hidden" :value="total_bayar" name="total_harga">
                                                <input type="hidden" :value="biaya_tiket" name="biaya_tiket">
                                                <input type="hidden" :value="biaya_guide" name="biaya_guide">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="text-center btn-checklist">
                            <button type="submit" class="btn btn-success btn-round">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Negara Provinsi kota -->
    <script>
        $(document).ready(function() {
            $('#negara_id').change(function() {
                $('#provinsi_id, #kota_id').val("");
                if ($('#negara option:selected').text() == "Indonesia") {
                    $('#provinsi, #kota').show(150);
                    $('#provinsi_id').append('<option hidden>-</option>');
                    $('#provinsi_id').html('<option value="' + province_id + '" selected>' +
                        value + '</option>');
                } else {
                    $('#provinsi, #kota').hide(150);
                }
            });
            $('#provinsi_id').on('change', function() {
                var provinsi_id = $(this).val();
                if (provinsi_id) {
                    $.ajax({
                        url: '/city/' + provinsi_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#kota_id').empty();
                                $('#kota_id').append('<option hidden>-</option>');
                                $.each(data, function(city_id, city) {
                                    $('select[name="asal_kota"]').append(
                                        '<option value="' + city_id + '">' + city
                                        .name + '</option>');
                                });
                            } else {
                                $('#kota_id').empty();
                            }
                        }
                    });
                } else {
                    $('#kota_id').empty();
                }
            });
        });
    </script>
    <!-- Maksimal Tanggal Turun-->
    <script>
        $(document).ready(function() {
            $("#tanggal-turun").change(function(e) {
                const naikDate = moment($("#tanggal-naik").val());
                const turunDate = moment(e.target.value);
                console.log(`${turunDate.diff(naikDate, 'days')}`)
                if (turunDate.diff(naikDate, 'days') > 5) {
                    alert("Maksimal pendakian 5 hari");
                    $("#tanggal-turun").val($("#tanggal-naik").val());
                } else if (turunDate.diff(naikDate, 'days') <= 0) {
                    alert("Tanggal turun tidak boleh dibawah tanggal naik");
                    $("#tanggal-turun").val($("#tanggal-naik").val());
                }
            });
        });
    </script>
    <!-- Tanggal Hari ini -->
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");
        document.getElementById("tanggal").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] +
            " " + tahun;
    </script>
    <!-- Auto Generate jumlah Tiket berdasarkan Kebangsaan -->
    <script>
        const anggotaInputComponent = {
            props: ['index', 'anggota'],
            template: `
            <tr role="row" class="odd">
                            <td></td>
                            <td>
                                <input style="background-color:#ffffff"
                                    id="nm_rombongan_1" class="input-text-md"
                                    type="text" name="nama[]"  data-title="nama" value="{{ old('nama[]') }}">
                            </td>
                            <td>
                                <input style="background-color:#f7f7f7"
                                    id="nm_rombongan_1" class="input-text-md"
                                    type="date" name="tanggal_lahir[]"
                                    data-date-format="dd/mm/yyyy" value="{{ old('tanggal_lahir[]') }}">
                            </td>
                            <td>
                                <select style="background-color:#f7f7f7"
                                    name="jenis_kelamin[]"
                                    class="input-text-md" id="nm_rombongan_1" value="{{ old('jenis_kelamin[]') }}">
                                    <option value="">Pilih Jenis Kelamin
                                    </option>
                                    <option value="Laki-laki">Laki-laki
                                    </option>
                                    <option value="Perempuan">Perempuan
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input style="background-color:#f7f7f7"
                                    id="nm_rombongan_1" class="input-text-md"
                                    type="text" name="alamat[]"
                                    data-title="alamat" value="{{ old('alamat[]') }}">
                            </td>
                            <td>
                                <select style="background-color:#f7f7f7"
                                    name="jenis_identitas[]"
                                    class="input-text-md" id="nm_rombongan_1" value="{{ old('jenis_identitas[]') }}">
                                    <option value="">-</option>
                                    <option value="KTP">KTP</option>
                                    <option value="Kartu Pelajar">Kartu
                                        Pelajar
                                    </option>
                                    <option value="SIM">SIM</option>
                                    <option value="Passport">Passport
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input style="background-color:#f7f7f7"
                                    id="nm_rombongan_1" class="input-text-md"
                                    type="number" name="nomor_identitas[]"
                                    data-title="nomor_identitas" value="{{ old('nomor_identitas[]') }}">
                            </td>
                            <td>
                                <input style="background-color:#f7f7f7"
                                    id="nm_rombongan_1" class="input-text-md"
                                    type="number" name="no_hp[]"
                                    data-title="no_hp" value="{{ old('no_hp[]') }}">
                            </td>
                            <td>
                                <select name="kebangsaan_id[]"
                                    class="input-text-md"
                                    id="exampleFormControlSelect"
                                    v-model="anggota[index]" value="{{ old('kebangsaan_id[]') }}">
                                    <option value="">-</option>
                                    @foreach ($kebangsaan as $kb)
                                        <option value="{{ $kb->id }}">{{ $kb->negara }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
            `
        }
        const tableComponent = {
            template: `
            <table class="table table-responsive">
                <thead>
                    <tr role="row">
                    <th>No.</th>
                    <th>Nama Lengkap<font color="red">*</font></th>
                    <th>Tanggal Lahir<font color="red">*</font></th>
                    <th>Jenis Kelamin<font color="red">*</font></th>
                    <th>Alamat (sesuai KTP)<font color="red">*</font></th>
                    <th>Jenis Identitas<font color="red">*</font></th>
                    <th>Nomor Identitas<font color="red">*</font></th>
                    <th>No Hp<font color="red">*</font></th>
                    <th>Kebangsaan<font color="red">*</font></th>
                </tr>    
                </thead>
                <tbody>
                    <slot></slot>
                </tbody>    
            </table>
            `
        };
        const app = Vue.createApp({
            delimiters: ["[[", "]]"],
            data() {
                return {
                    jumlah_anggota: 0,
                    selectedGuideIndex: null,
                    kebangsaan_ketua: null,
                    anggota: [],
                    harga_guide: null,
                    kebangsaan: [],
                    form: {
                        kebangsaan: null,
                    }
                }
            },
            methods: {
                changeSelectedIndexGuide(selected) {
                    const guides = document.getElementsByClassName('guide');
                    console.log(guides[selected].dataset.harga)

                    this.harga_guide = parseInt(guides[selected].dataset.harga)
                },
                changeAnggotaLength(event) {

                    console.log(this.anggota)
                    this.jumlah_anggota = event.target.value
                    // for (let i = 0; i < this.jumlah_anggota; i++) {
                    //     this.anggota.push(this.form);
                    // }
                },
            },
            created() {
                this.$refs
            },
            computed: {
                jumlah_wna() {
                    let total = 0;
                    const wna = this.anggota.filter((item) => {
                        if (item != 1) {
                            return item
                        }
                    })

                    if (this.kebangsaan_ketua != 1 && this.kebangsaan_ketua != null) {
                        total = wna.length + 1
                    } else {
                        total = wna.length
                    }

                    return total
                },
                jumlah_wni() {
                    total = 0;
                    const wni = this.anggota.filter((item) => {
                        if (item == 1) {
                            return item
                        }
                    })
                    if (this.kebangsaan_ketua == 1) {
                        total = wni.length + 1
                    } else {
                        total = wni.length;
                    }
                    return total;
                },
                total_harga_wni() {
                    return parseInt(this.jumlah_wni * 45000);
                },
                total_harga_wna() {
                    return parseInt(this.jumlah_wna * 90000)
                },
                biaya_tiket() {
                    const biaya_tiket = this.total_harga_wna + this.total_harga_wni
                    return biaya_tiket
                },
                biaya_guide() {
                    const biaya_guide = parseInt(this.harga_guide * (
                        parseInt(this.jumlah_anggota) + 1))
                    return biaya_guide
                },
                total_bayar() {
                    const total = this.total_harga_wna + this.total_harga_wni + parseInt(this.harga_guide * (
                        parseInt(this
                            .jumlah_anggota) + 1))
                    return total
                }


            }
        });
        app.component('table-component', tableComponent);
        app.component('anggota-input-component', anggotaInputComponent)
        app.mount("#app")
    </script>
    <script>
        $(function() {
            $('input:radio[name="perjalanan_id"]').change(function() {
                if ($(this).val() == '1') {

                } else {
                    $("input[name=perjalanan_id]").prop("disabled", true);
                    alert(
                        "Paket Guide Jadwal pendakian yang anda pilih sudah terbooking silahkan pilih jadwal lain hari"
                    );
                }
            });
        });
    </script>
@endsection

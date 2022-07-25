@extends('frontend.layout.template')
@section('title', 'Detail Wisatawan')

@section('content')
    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <!-- ================== Data Anggota =================-->
                    <form action="{{ route('myorder.update.mendaki', $pesanan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="pl-sm-4">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="add-row_wrapper"
                                                class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-responsive">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th>No.</th>
                                                                    <th>Nama Lengkap<font color="red">*</font>
                                                                    </th>
                                                                    <th>Tanggal Lahir<font color="red">*</font>
                                                                    </th>
                                                                    <th>Jenis Kelamin<font color="red">*</font>
                                                                    </th>
                                                                    <th>Alamat (sesuai KTP)<font color="red">*</font>
                                                                    </th>
                                                                    <th>Jenis Identitas<font color="red">*</font>
                                                                    </th>
                                                                    <th>Nomor Identitas<font color="red">*</font>
                                                                    </th>
                                                                    <th>No Hp<font color="red">*</font>
                                                                    </th>
                                                                    <th>Kebangsaan<font color="red">*</font>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no = 1; ?>
                                                                @foreach ($anggota as $angg)
                                                                    <tr role="row" class="odd">
                                                                        <td>{{ $no++ }}</td>
                                                                        <td>
                                                                            <input style="background-color:#ffffff"
                                                                                id="nm_rombongan_1" class="input-text-md"
                                                                                type="text" name="nama"
                                                                                value="{{ $angg->nama }}" required>
                                                                        </td>
                                                                        <td>
                                                                            <input style="background-color:#f7f7f7"
                                                                                id="nm_rombongan_1" class="input-text-md"
                                                                                type="date" name="tanggal_lahir"
                                                                                data-date-format="dd/mm/yyyy"
                                                                                value="{{ $angg->tanggal_lahir }}"
                                                                                required>
                                                                        </td>
                                                                        <td>
                                                                            <select style="background-color:#f7f7f7"
                                                                                name="jenis_kelamin" class="input-text-md"
                                                                                id="nm_rombongan_1">
                                                                                <option value="" disabled>
                                                                                    {{ $angg->jenis_kelamin }}
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
                                                                                type="text" name="alamat"
                                                                                data-title="alamat"
                                                                                value="{{ $angg->alamat }}" required>
                                                                        </td>
                                                                        <td>
                                                                            <select style="background-color:#f7f7f7"
                                                                                name="jenis_identitas"
                                                                                class="input-text-md" id="nm_rombongan_1"
                                                                                required>
                                                                                <option value="" disabled>
                                                                                    {{ $angg->jenis_identitas }}
                                                                                </option>
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
                                                                                type="number" name="nomor_identitas"
                                                                                data-title="nomor_identitas"
                                                                                value="{{ $angg->nomor_identitas }}"
                                                                                required>
                                                                        </td>
                                                                        <td>
                                                                            <input style="background-color:#f7f7f7"
                                                                                id="nm_rombongan_1" class="input-text-md"
                                                                                type="number" name="no_hp"
                                                                                data-title="no_hp"
                                                                                value="{{ $angg->no_hp }}" required>
                                                                        </td>
                                                                        <td>
                                                                            <input style="background-color:#f7f7f7"
                                                                                id="nm_rombongan_1" class="input-text-md"
                                                                                type="text" name="kebangsaan_id"
                                                                                data-title="kebangsaan_id"
                                                                                value="{{ $angg->kebangsaan->negara }}"
                                                                                disabled>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-sm-4 text-center">
                            <div class="row">
                                <a href="{{ route('myorder.show.mendaki', $pesanan->id) }}" class="btn btn-link btn-md">
                                    <span class="btn-label"><i class="fas fa-undo"></i>
                                    </span> Kembali
                                </a>
                                <button type="submit" class="btn btn-success btn-round">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

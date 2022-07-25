@extends('admin.layout.template')
@section('title', 'Perjalanan Masuk Pemandu Jalur')

@section('contentadmin')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Perjalanan Masuk</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/guide">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Perjalanan Masuk</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="perjalanan-masuk"
                                            class="table display table-striped table-hover dataTable" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Tanggal Naik</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Nama Ketua Wisatawan</th>
                                                    <th>Alamat</th>
                                                    <th>Jumlah Anggota</th>
                                                    <th>Paket Yang Dipilih</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <tr role="row" class="odd">
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        {{ date('l, d F Y', strtotime($pesanan->wisatawan->kuota->tanggal_pendakian)) }}
                                                    </td>
                                                    <td>
                                                        {{ date('l, d F Y', strtotime($pesanan->wisatawan->tanggal_turun)) }}
                                                    </td>
                                                    <td>{{ $pesanan->wisatawan->nama }}</td>
                                                    <td>{{ $pesanan->wisatawan->alamat }}</td>
                                                    <td>{{ $pesanan->jumlah_tiket }}</td>
                                                    <td>{{ $pesanan->wisatawan->perjalanan->nama_paket }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a
                                                                href="{{ route('guide.perjalanan.terima', $pesanan->id) }}">
                                                                <button class="btn btn-icon btn-round btn-success btn-sm"
                                                                    id="alert_demo_3_3"><i
                                                                        class="fas fa-check"></i></button>
                                                            </a>
                                                            {{-- <button class="btn btn-icon btn-round btn-danger btn-sm"
                                                                id="alert_demo_8"><i class="fas fa-times"></i>
                                                            </button> --}}
                                                        </div>
                                                    </td>
                                                </tr>
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
    </div>
    <!--Datatable-->
    <script>
        $(document).ready(function() {
            $('#perjalanan-masuk').DataTable();
        });
    </script>
    <!--Sweet Alert-->
    <script>
        //== Class definition
        var SweetAlert2Demo = function() {

            //== Demos
            var initDemos = function() {

                //== Sweetalert Demo 3
                $('#alert_demo_3_1').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "warning",
                        buttons: {
                            confirm: {
                                className: 'btn btn-warning'
                            }
                        },
                    });
                });

                $('#alert_demo_3_2').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "error",
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger'
                            }
                        },
                    });
                });

                $('#alert_demo_3_3').click(function(e) {
                    swal("Good job!", "Selamat Menjalani Pendakian Anda!", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    });
                });

                $('#alert_demo_3_4').click(function(e) {
                    swal("Good job!", "You clicked the button!", {
                        icon: "info",
                        buttons: {
                            confirm: {
                                className: 'btn btn-info'
                            }
                        },
                    });
                });

                //== Sweetalert Demo 4
                $('#alert_demo_4').click(function(e) {
                    swal({
                        title: "Good job!",
                        text: "You clicked the button!",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "Confirm Me",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                });

                $('#alert_demo_5').click(function(e) {
                    swal({
                        title: 'Input Something',
                        html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
                        content: {
                            element: "input",
                            attributes: {
                                placeholder: "Input Something",
                                type: "text",
                                id: "input-field",
                                className: "form-control"
                            },
                        },
                        buttons: {
                            cancel: {
                                visible: true,
                                className: 'btn btn-danger'
                            },
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(
                        function() {
                            swal("", "You entered : " + $('#input-field').val(), "success");
                        }
                    );
                });

                $('#alert_demo_6').click(function(e) {
                    swal("This modal will disappear soon!", {
                        buttons: false,
                        timer: 3000,
                    });
                });

                $('#alert_demo_7').click(function(e) {
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        buttons: {
                            confirm: {
                                text: 'Yes, delete it!',
                                className: 'btn btn-success'
                            },
                            cancel: {
                                visible: true,
                                className: 'btn btn-danger'
                            }
                        }
                    }).then((Delete) => {
                        if (Delete) {
                            swal({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                type: 'success',
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                        } else {
                            swal.close();
                        }
                    });
                });

                $('#alert_demo_8').click(function(event) {
                    swal({
                        title: 'Apakah Anda Yakin?',
                        text: "Menolak Perjalanan ini?",
                        icon: "warning",
                        type: 'warning',
                        buttons: {
                            cancel: {
                                visible: true,
                                text: 'No, cancel!',
                                className: 'btn btn-link'
                            },
                            confirm: {
                                text: 'Yes, delete it!',
                                className: 'btn btn-danger'
                            }
                        }
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location =
                                "{{ route('guide.perjalanan.tolak', $pesanan->id) }}"
                            swal("Allright, Maybe Next Time. Have a Nice Day!", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                }
                            });
                        } else {
                            swal.close();
                        }
                    });
                })

            };

            return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();

        //== Class Initialization
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>
@endsection

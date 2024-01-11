@extends('backend.layout.base')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4>{{ $title }}</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Helper::apk()->app_name }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ $title }}</a></li>

                </ol>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info">Item Sold 1230</div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#uploadstudents"
                        class="btn btn-dark waves-effect waves-light ">Uploads</a>
                    <button class="btn btn-danger waves-effect waves-light" onclick="deleteItem()">Delete</button>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#AddStudents"
                        class="btn btn-dark waves-effect waves-light ">Add</a>
                    <button class="btn btn-primary waves-effect waves-light" onclick="Proses()">Proses</button>


                    <br>
                    <br>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: auto;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Full Name</th>
                                        <th>P Rumah Tangga</th>
                                        <th>J Anggota Keluarga</th>
                                        <th>Usia</th>
                                        <th>Status Sosial</th>
                                        <th>Kondisi Kesehatan</th>
                                        <th>Bobot Pekerjaan</th>
                                        <th>Kondisi Rumah</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>

                                <tbody id="show_data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div id="uploadstudents" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload Students
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="students/UploadStudents" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="mb-3 password-input-container">
                                <label class="col-md-2 col-form-label" for="password">Upload File</label>
                                <input type="file" class="form-control" id="file" name="file"
                                    placeholder="Masukan Password" required />
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="AddStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/students/addProses" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="full_name">Nis</label>
                                    <input type="number" class="form-control" id="nis" name="nis"
                                        placeholder="Masukan" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="full_name">Nama</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                        placeholder="Masukan Nama Lengkap" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Pendapatan Rumah Tangga</label>
                                    <select class="form-control" name="prt" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($prt as $r)
                                            <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Jumlah Anggota Keluarga </label>
                                    <select class="form-control" name="jak" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($jak as $r)
                                            <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Usia</label>
                                    <select class="form-control" name="usia" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($usia as $r)
                                        <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Status Sosial </label>
                                    <select class="form-control" name="ss" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($ss as $r)
                                            <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Kondisi Kesehatan </label>
                                    <select class="form-control" name="kk" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($kk as $r)
                                            <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Bobot Pekerjaan </label>
                                    <select class="form-control" name="bp" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($bp as $r)
                                            <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="prt">Kondisi Rumah </label>
                                    <select class="form-control" name="kr" id="sts" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($kr as $r)
                                        <option value="{{ $r->nilai }}">{{ $r->jenis }}
                                        </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        function Proses() {
            $.ajax({
                type: 'post',
                url: '{{ url('/students/proses/') }}/',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (data.success) {
                        show_data();
                        Swal.fire(
                            'Success!',
                            'Your file has been uploaded.',
                            "success",

                        );
                    }
                }
            });
        }
        show_data();

        function show_data() {
            $.ajax({
                type: 'GET',
                url: '{{ route('students.load_data') }}',
                async: true,
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    var html = '';
                    var i;
                    var no = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].nis + '</td>' +
                            '<td>' + data[i].full_name + '</td>' +
                            '<td>' + data[i].prt + '</td>' +
                            '<td>' + data[i].jak + '</td>' +
                            '<td>' + data[i].usia + '</td>' +
                            '<td>' + data[i].ss + '</td>' +
                            '<td>' + data[i].kk + '</td>' +
                            '<td>' + data[i].bp + '</td>' +
                            '<td>' + data[i].kr + '</td>' +
                            '<td>' + data[i].hasil + '</td>' +
                            '</tr>';
                    }
                    // console.log(html);
                    $('#show_data').html(html);
                }
            });
        }

        function deleteItem(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    setInterval(function() {
                            location.reload();
                        }, 30000),
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ),
                        $.ajax({
                            type: 'POST',
                            url: '{{ url('/students/delete') }}/',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(data) {

                                if (data.success) {

                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        "success",

                                    );

                                }

                            }
                        });
                }
                if (result.isConfirmed) show_data();
            })

        }
    </script>
@endsection

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
                    <div class="row">


                        <div class="col-md-4">
                            <div class="mb-3">
                                <select class="form-control" name="idStaudents" id="idStaudents" onchange="getStudents()"
                                    required>
                                    <option value="all">-- Pilih Siswa --</option>
                                    @foreach ($laporan as $r)
                                        <option value="{{ $r->id }}">{{ $r->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <button class="btn btn-success waves-effect waves-light"
                                    onclick="printExcel()">Excel</button>
                            </div>
                        </div>
                    </div>



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

    </div>
    <script>
        function printExcel() {

            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "{{ url('laporan/cetakExcel') }}/",
                data: {
                    id: $("#idStaudents").val()
                },

                success: function(response) {
                    console.log(response.file);
                    window.open('storage/excel/' + response.file, '_blank');
                },
                error: function() {
                    alert("error");
                }
            });
            return false;

        }
        show_data();

        function show_data() {
            $.ajax({
                type: 'GET',
                url: '{{ route('laporan.load_data') }}',
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

        function getStudents() {
            // console.log( $("#idStaudents").val(),);
            $.ajax({
                type: 'GET',
                url: '{{ route('laporan.load_data') }}',
                data: {
                    id: $("#idStaudents").val()
                },
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
    </script>
@endsection

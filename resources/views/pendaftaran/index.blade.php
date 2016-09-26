@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->
    
    <div class="content">
        <div class="content-info-up">
            <h3>Daftar data Pendaftaran lomba</h3>
            <a href="{{route('pendaftaran.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <table id="table-pendaftaran" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>RW</th>
                            <th>RT</th>
                            <th>Perlombaan</th>
                            <th>Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->
</section>
<!-- /.main-section -->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
           $('#table-pendaftaran') .DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: '{{route('ajax_pendaftaran')}}',
                columns: [
                    {data: 'nama_peserta', name: 'peserta.nama_peserta'},
                    {data: 'jk', name: 'peserta.jk'},
                    {data: 'nama_rw', name: 'rw.nama_rw', searchable: false, orderable: false},
                    {data: 'nama_rt', name: 'rt.nama_rt', searchable: false, orderable: false},
                    {data: 'nama_lomba', name: 'jenis_lomba.nama_lomba'},
                    {data: 'tahun', name: 'pendaftaran.tahun'},
                ]
           });
        });
    </script>
@endsection
@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->
    
    <div class="content">
        <div class="content-info-up">
            <h3>Daftar data RT</h3>
            <a href="{{route('peserta.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <table id="table-peserta" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>RW</th>
                            <th>RT</th>
                            <th>Aksi</th>
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
           $('#table-peserta') .DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: '{{route('ajax_peserta')}}',
                columns: [
                    {data: 'nama_peserta', name: 'peserta.nama_peserta'},
                    {data: 'jk', name: 'peserta.jk'},
                    {data: 'nama_rw', name: 'nama_rw'},
                    {data: 'nama_rt', name: 'nama_rt'},
                    {data: 'aksi', name: 'aksi'}
                ]
           });
        });
    </script>
@endsection
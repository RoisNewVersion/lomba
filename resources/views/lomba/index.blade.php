@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->
    
    <div class="content">
        <div class="content-info-up">
            <h3>Daftar data Lomba</h3>
            <a href="{{route('lomba.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-10 col-sm-8 col-xs-12">
                <table id="table-lomba" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lomba</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ?>
                    @foreach($lombas as $lomba)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$lomba->nama_lomba}}</td>
                            <td>{{$lomba->waktu}}</td>
                            <td>{{$lomba->keterangan}}</td>
                            <td>
                                <a href="{{route('lomba.edit', [$lomba->id_lomba])}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <form style="display: inline;" method="post" action="{{route('lomba.destroy', [$lomba->id_lomba])}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php $no ++ ?>
                    @endforeach
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
           $('#table-lomba') .DataTable({
                responsive: true
           });
        });
    </script>
@endsection
@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->
    
    <div class="content">
        <div class="content-info-up">
            <h3>Daftar data RW</h3>
            <a href="{{route('rw.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($rws as $rw)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $rw->nama_rw}}</td>
                            <td>
                                <a href="{{route('rw.edit', [$rw->id_rw])}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <form style="display: inline;" method="post" action="{{route('rw.destroy', [$rw->id_rw])}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
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
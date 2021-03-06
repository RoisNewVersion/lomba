@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->

    <div class="content">
        <div class="content-info-up">
            <h3>Edit data RW</h3>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
            <form action="{{route('rw.update', [$rw->id_rw])}}" method="POST" class="form-horizontal" role="form">
            {{ csrf_field() }}
            {{method_field('patch')}}
                <div class="form-group {{ $errors->has('nama_rw') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_rw">Nama RW</label>
                    <input class="form-control" type="text" name="nama_rw" id="nama_rw" value="{{$rw->nama_rw}}" placeholder="Nama RW">

                    {!! $errors->has('nama_rw') ? '<span class="help-block">'.$errors->first('nama_rw').'</span>' : '' !!}
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <a href="{{route('rw.index')}}" class="btn btn-danger btn-sm"> Batal</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
</section>
<!-- /.main-section -->
@endsection
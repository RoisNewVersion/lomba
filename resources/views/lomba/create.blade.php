@extends('layout.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.datepicker.min.css')}}">
@endsection

@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->

    <div class="content">
        <div class="content-info-up">
            <h3>Form tambah Lomba </h3>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
            <form action="{{route('lomba.store')}}" method="POST" class="form-horizontal" role="form">
            {{ csrf_field() }}
                <div class="form-group {{ $errors->has('nama_lomba') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_lomba">Nama Lomba</label>
                    <input class="form-control" type="text" name="nama_lomba" id="nama_lomba" value="{{old('nama_lomba')}}" placeholder="Nama Lomba" required="reuired">

                    {!! $errors->has('nama_lomba') ? '<span class="help-block">'.$errors->first('nama_lomba').'</span>' : '' !!}
                </div>

                <div class="form-group {{ $errors->has('waktu') ? ' has-error' : '' }}">
                    <label class="control-label" for="waktu">Waktu Lomba</label>
                    <input class="form-control" type="text" name="waktu" id="waktu" value="{{old('waktu')}}" placeholder="Waktu Lomba" required="reuired">

                    {!! $errors->has('waktu') ? '<span class="help-block">'.$errors->first('waktu').'</span>' : '' !!}
                </div>

                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                    <label class="control-label" for="keterangan">Keterangan Lomba</label>
                    <input class="form-control" type="text" name="keterangan" id="keterangan" value="{{old('keterangan')}}" placeholder="Keterangan Lomba" required="reuired">

                    {!! $errors->has('keterangan') ? '<span class="help-block">'.$errors->first('keterangan').'</span>' : '' !!}
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{route('lomba.index')}}" class="btn btn-danger btn-sm"> Batal</a>
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

@section('js')
    <script src="{{asset('js/bootstrap.datepicker.min.js')}}"></script>
    <script>
        $('#waktu').datepicker({
            format: 'yyyy-mm-dd',
            clearBtn: true
        });
    </script>
@endsection
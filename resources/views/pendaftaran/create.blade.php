@extends('layout.default')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
@endsection
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->

    <div class="content">
        <div class="content-info-up">
            <h3>Form tambah Pendaftaran </h3>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
            <form action="{{route('pendaftaran.store')}}" method="POST" class="form-horizontal" role="form">
            {{ csrf_field() }}

                <div class="form-group {{ $errors->has('nama_peserta') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_peserta">Nama Peserata</label>
                    
                    <select id="nama_peserta" name="nama_peserta" class="form-control" required="reuired">
                        

                        @foreach($nama_pesertas as $nama_peserta => $val)
                            <option value="{{$nama_peserta}}" @if(old('nama_peserta')==$nama_peserta) selected @endif >{{$val}}</option>
                        @endforeach
                    </select>
                    

                    {!! $errors->has('nama_peserta') ? '<span class="help-block">'.$errors->first('nama_peserta').'</span>' : '' !!}
                </div>

                <div class="form-group {{ $errors->has('nama_lomba') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_lomba">Nama Lomba</label>
                    
                    <select id="nama_lomba" name="nama_lomba" class="form-control">
                      

                        @foreach($nama_lombas as $nama_lomba => $val)
                            <option value="{{$nama_lomba}}" @if(old('nama_lomba')==$nama_lomba) selected @endif >{{$val}}</option>
                        @endforeach
                    </select>
                    

                    {!! $errors->has('nama_lomba') ? '<span class="help-block">'.$errors->first('nama_lomba').'</span>' : '' !!}
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{route('pendaftaran.index')}}" class="btn btn-danger btn-sm"> Batal</a>
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
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>
        $('#nama_peserta').select2({
            placeholder: "Pilih peserta",
            allowClear: true
        });
        $('#nama_lomba').select2({
            placeholder: "Pilih lomba",
            allowClear: true
        });
    </script>
@endsection
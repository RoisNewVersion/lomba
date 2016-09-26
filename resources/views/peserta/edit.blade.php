@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->

    <div class="content">
        <div class="content-info-up">
            <h3>Form edit Peserta </h3>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
            <form action="{{route('peserta.update', [$peserta->id_peserta])}}" method="POST" class="form-horizontal" role="form">
            {{ csrf_field() }}
            {{method_field('patch')}}

                <div class="form-group {{ $errors->has('nama_peserta') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_peserta">Nama Peserta</label>
                    <input class="form-control" type="text" name="nama_peserta" id="nama_peserta" value="{{$peserta->nama_peserta}}" placeholder="Nama Peserta">

                    {!! $errors->has('nama_peserta') ? '<span class="help-block">'.$errors->first('nama_peserta').'</span>' : '' !!}
                </div>

                <div class="form-group {{ $errors->has('jk') ? ' has-error' : '' }}">
                    <label class="control-label" for="jk">Jenis Kelamin</label>
                    
                    <select name="jk" class="form-control">
                        <option>Pilih</option>

                        @foreach($jks as $jk => $val)
                            <option value="{{$jk}}" @if($peserta->jk==$jk) selected @endif >{{$val}}</option>
                        @endforeach
                    </select>
                    

                    {!! $errors->has('jk') ? '<span class="help-block">'.$errors->first('jk').'</span>' : '' !!}
                </div>

                <div class="form-group {{ $errors->has('nama_rw') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_rw">Nama RW</label>
                    
                    <select name="nama_rw" class="form-control">
                        <option>Pilih RW</option>

                        @foreach($rws as $rw => $val)
                            <option value="{{$rw}}" @if($peserta->rw_id==$rw) selected @endif >{{$val}}</option>
                        @endforeach
                    </select>
                    

                    {!! $errors->has('nama_rw') ? '<span class="help-block">'.$errors->first('nama_rw').'</span>' : '' !!}
                </div>

                <div class="form-group {{ $errors->has('nama_rt') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_rt">Nama RT</label>
                    
                    <select name="nama_rt" class="form-control">
                        <option>Pilih RT</option>

                        @foreach($rts as $rt => $val)
                            <option value="{{$rt}}" @if($peserta->rt_id==$rt) selected @endif >{{$val}}</option>
                        @endforeach
                    </select>
                    

                    {!! $errors->has('nama_rt') ? '<span class="help-block">'.$errors->first('nama_rt').'</span>' : '' !!}
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="{{route('peserta.index')}}" class="btn btn-danger btn-sm"> Batal</a>
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
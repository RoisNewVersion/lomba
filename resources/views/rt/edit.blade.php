@extends('layout.default')
@section('content')
<!-- Main Section -->
<section class="main-section">
    <!-- Add Your Content Inside -->

    <div class="content">
        <div class="content-info-up">
            <h3>Form edit RT </h3>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
            <form action="{{route('rt.update', [$rt->id_rt])}}" method="POST" class="form-horizontal" role="form">
            {{ csrf_field() }}
            {{method_field('patch')}}
                <div class="form-group {{ $errors->has('nama_rw') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_rw">Nama RW</label>
                    
                    <select name="nama_rw" class="form-control">
                        <option>Pilih RW</option>

                        @foreach($rws as $rw => $val)
                            <option value="{{$rw}}" @if($rt->rw_id ==$rw) selected @endif >{{$val}}</option>
                        @endforeach
                    </select>
                    

                    {!! $errors->has('nama_rw') ? '<span class="help-block">'.$errors->first('nama_rw').'</span>' : '' !!}
                </div>
                <div class="form-group {{ $errors->has('nama_rt') ? ' has-error' : '' }}">
                    <label class="control-label" for="nama_rt">Nama RT</label>
                    <input class="form-control" type="text" name="nama_rt" id="nama_rt" value="{{$rt->nama_rt}}" placeholder="Nama RT">

                    {!! $errors->has('nama_rt') ? '<span class="help-block">'.$errors->first('nama_rt').'</span>' : '' !!}
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
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
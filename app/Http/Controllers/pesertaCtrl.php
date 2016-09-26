<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Peserta;
use App\Rw;
use App\Rt;
use Yajra\Datatables\Facades\Datatables;
use Alert;

class pesertaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('peserta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jks = ['L'=>'Laki-laki', 'P'=>'perempuan'];
        $rts = Rt::pluck('nama_rt', 'id_rt');
        $rws = Rw::pluck('nama_rw', 'id_rw');

        return view('peserta.create', compact('pesertas', 'rws', 'rts', 'jks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama_rw'=>'required|integer', 
            'nama_rt'=>'required|integer',
            'nama_peserta'=>'required',
            'jk'=>'required']);

        $unique = Peserta::where('rw_id', '=', $request->input('nama_rw'))
            ->where('rt_id', '=', $request->input('nama_rt'))
            ->where('nama_peserta', '=', $request->input('nama_peserta'))
            ->count();

        if ($unique > 0 ) {
            Alert::error('Data sudah ADA !', 'Oh snap!');
            return redirect()->back()->withInput();
        }

        $datapeserta = [
                    'rt_id'=>$request->input('nama_rt'),
                    'nama_peserta' => strtoupper($request->input('nama_peserta')),
                    'rw_id' => $request->input('nama_rw'),
                    'jk'=> $request->input('jk')
                    ];
        if (Peserta::create($datapeserta)) {
            Alert::success('Berhasil simpan', 'Oke berhasil');
            return redirect()->route('peserta.index');
        } else {
            Alert::error('Gagal simpan', 'Oh snap!');
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $jks = ['L'=>'Laki-laki', 'P'=>'perempuan'];
        $rts = Rt::pluck('nama_rt', 'id_rt');
        $rws = Rw::pluck('nama_rw', 'id_rw');

        return view('peserta.edit', compact('peserta', 'rws', 'rts', 'jks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['nama_rw'=>'required|integer', 
            'nama_rt'=>'required|integer',
            'nama_peserta'=>'required',
            'jk'=>'required']);

        $pes = Peserta::findOrFail($id);

        $datapeserta = [
                    'rt_id'=>$request->input('nama_rt'),
                    'nama_peserta' => strtoupper($request->input('nama_peserta')),
                    'rw_id' => $request->input('nama_rw'),
                    'jk'=> $request->input('jk')
                    ];

        if ($pes->update($datapeserta)) {
            Alert::success('Berhasil update', 'Oke berhasil');
            return redirect()->route('peserta.index');
        } else {
            Alert::error('Gagal update', 'Oh snap!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Peserta::find($id)) {
            if (Peserta::destroy($id)) {
                Alert::success('Berhasil hapus', 'Oke berhasil');
                return redirect()->route('peserta.index');
            } else {
                Alert::error('Gagal hapus', 'Oh snap!');
                return redirect()->back();
            } 
        } else {
            Alert::error('Gagal hapus', 'Oh snap!');
            return redirect()->back();
        }
    }

    // ajax peserta 
    public function ajax_peserta()
    {
        $pes = Peserta::join('rt', 'peserta.rt_id', '=', 'rt.id_rt')
                ->join('rw', 'peserta.rw_id', '=', 'rw.id_rw')
                ->select(['rw.nama_rw', 'rt.nama_rt', 'peserta.*']);
                // ->orderBy('peserta.id_peserta', 'asc');

        return Datatables::of($pes)
                ->editColumn('nama_peserta', '{{strtoupper($nama_peserta)}}')
                ->addColumn('aksi', function($pes){
                    return view('peserta.action', compact('pes'))->render();
                })
                ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use Alert;
use App\Pendaftaran;
use App\Peserta;
use App\JenisLomba;

class pendaftaranCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pendaftaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama_pesertas = Peserta::pluck( 'nama_peserta', 'id_peserta');
        $nama_lombas = JenisLomba::pluck('nama_lomba', 'id_lomba');

        return view('pendaftaran.create', compact('nama_pesertas', 'nama_lombas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        // die();
        $this->validate($request, ['nama_lomba'=>'required|integer', 'nama_peserta'=>'required|integer']);

        $unique = Pendaftaran::where('lomba_id', '=', $request->input('nama_lomba'))
            ->where('peserta_id', '=', $request->input('nama_peserta'))
            ->count();

        if ($unique > 0 ) {
            Alert::error('Data sudah ADA !', 'Oh snap!');
            return redirect()->back()->withInput();
        }

        $dataInput = [
                        'lomba_id' => $request->input('nama_lomba'),
                        'peserta_id' => $request->input('nama_peserta'),
                        'tahun'=>date('Y')
                    ];

        if (Pendaftaran::create($dataInput)) {
            Alert::success('Berhasil simpan', 'Oke berhasil');
            return redirect()->route('pendaftaran.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajax_pendaftaran()
    {
        $data = Pendaftaran::join('peserta', 'pendaftaran.peserta_id', '=', 'peserta.id_peserta')
                            ->join('jenis_lomba', 'pendaftaran.lomba_id', '=', 'jenis_lomba.id_lomba')
                            ->join('rt', 'peserta.rt_id', '=', 'rt.id_rt')
                            ->join('rw', 'peserta.rw_id', '=', 'rw.id_rw')
                            ->where('pendaftaran.tahun', '=', date('Y'))
                            ->orderBy('rw.id_rw', 'asc')
                            ->select(['pendaftaran.tahun', 'jenis_lomba.nama_lomba', 'peserta.nama_peserta', 'peserta.jk', 'rt.nama_rt', 'rw.nama_rw']);
        return Datatables::of($data)->make(true);
    }
}

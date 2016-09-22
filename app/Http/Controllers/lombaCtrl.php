<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use Alert;
use App\JenisLomba;

class lombaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lombas = JenisLomba::orderBy('waktu', 'desc')->get();
        return view('lomba.index', compact('lombas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lomba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama_lomba'=>'required', 'waktu'=>'required', 'keterangan'=>'required']);
        $jen = JenisLomba::where('nama_lomba', '=', strtoupper($request->input('nama_lomba')))
            ->where('waktu', '=', $request->input('waktu'))->count();

        if ($jen > 0 ) {
            Alert::error('Data sudah ADA !', 'Oh snap!');
            return redirect()->back()->withInput();
        }

        $dataInput = [
            'nama_lomba'=>strtoupper($request->input('nama_lomba')),
            'waktu'=> $request->input('waktu'),
            'keterangan'=>$request->input('keterangan')
            ];

        if (JenisLomba::create($dataInput)) {
            Alert::success('Berhasil simpan', 'Oke berhasil');
            return redirect()->route('lomba.index');
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
        $lomba = JenisLomba::findOrFail($id);
        return view('lomba.edit', compact('lomba'));
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
        $this->validate($request, ['nama_lomba'=>'required', 'waktu'=>'required', 'keterangan'=>'required']);

        $jen = JenisLomba::where('nama_lomba', '=', strtoupper($request->input('nama_lomba')))
            ->where('waktu', '=', $request->input('waktu'))->count();

        $dataInput = [
            'nama_lomba'=>strtoupper($request->input('nama_lomba')),
            'waktu'=> $request->input('waktu'),
            'keterangan'=>$request->input('keterangan')
            ];

        $lomba = JenisLomba::findOrFail($id);

        if ($lomba->update($dataInput)) {
            Alert::success('Berhasil update', 'Oke berhasil');
            return redirect()->route('lomba.index');
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
        if (JenisLomba::find($id)) {
            if (JenisLomba::destroy($id)) {
                Alert::success('Berhasil hapus', 'Oke berhasil');
                return redirect()->route('lomba.index');
            } else {
                Alert::error('Gagal hapus', 'Oh snap!');
                return redirect()->back();
            } 
        } else {
            Alert::error('Gagal hapus', 'Oh snap!');
            return redirect()->back();
        }
    }
}

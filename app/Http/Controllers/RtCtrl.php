<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rt;
use App\Rw;
use Alert;

class RtCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rts = Rt::orderBy('rw_id', 'asc')->get();
        return view('rt.index', compact('rts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rws = Rw::pluck('nama_rw', 'id_rw');
        return view('rt.create', compact('rws'));
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
        // validasi input
        $this->validate($request, ['nama_rw'=>'required|integer', 'nama_rt'=>'required|integer']);

        if (Rt::create(['rw_id'=>$request->input('nama_rw'), 'nama_rt'=>$request->input('nama_rt')])) {
            Alert::success('Berhasil simpan', 'Oke berhasil');
            return redirect()->route('rt.index');
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
        $rws = Rw::pluck('nama_rw', 'id_rw');
        $rt = Rt::findOrfail($id);
        return view('rt.edit', compact('rt', 'rws'));
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
        $this->validate($request, ['nama_rw'=>'required|integer', 'nama_rt'=>'required|integer']);
        $rt = Rt::findOrFail($id);

        if ($rt->update(['rw_id'=>$request->input('nama_rw'), 'nama_rt'=>$request->input('nama_rt')])) {
            Alert::success('Berhasil update', 'Oke berhasil');
            return redirect()->route('rt.index');
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
        if (Rt::find($id)) {
            if (Rt::destroy($id)) {
                Alert::success('Berhasil hapus', 'Oke berhasil');
                return redirect()->route('rt.index');
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

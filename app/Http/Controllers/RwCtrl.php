<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rw;
use Alert;

class RwCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rws = Rw::all();
        return view('rw.index', compact('rws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rw.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nama_rw'=>'required|unique:rw,nama_rw']);

        if (Rw::create(['nama_rw'=>strtoupper($request->input('nama_rw'))])) {
            Alert::success('Berhasil simpan', 'Oke berhasil');
            return redirect()->route('rw.index');
        } else {
            Alert::error('Gagal simpan', 'Oh snap!');
            return redirect()->back();
        }
        
        // print_r($request->all());
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
        $rw = Rw::findOrFail($id);
        return view('rw.edit', compact('rw'));
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
        $this->validate($request, ['nama_rw'=>'required|unique:rw,nama_rw']);

        $rw = Rw::findOrFail($id);

        if ($rw->update(['nama_rw'=>strtoupper($request->input('nama_rw'))])) {
            Alert::success('Berhasil update', 'Oke berhasil');
            return redirect()->route('rw.index');
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
        if (Rw::find($id)) {
            if (Rw::destroy($id)) {
                Alert::success('Berhasil hapus', 'Oke berhasil');
                return redirect()->route('rw.index');
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

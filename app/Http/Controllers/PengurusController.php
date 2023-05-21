<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Foto;
use App\Models\Pelinggih;
use App\Models\Pura;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puras = DB::table('puras')->get();
        return view('pages.pengurus.addPengurus', compact('puras'));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string',
            'sebagai' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'tahun_mulai' => 'required',
            'tahun_berakhir' => 'required',
            'status' => 'required',
        ]);

        $pengurus = new Pengurus;
        $pengurus->pura_id = $request->pura_id;
        $pengurus->nama = $request->nama;
        $pengurus->alamat = $request->alamat;
        $pengurus->sebagai = $request->sebagai;
        $pengurus->telepon = $request->telepon;
        $pengurus->tahun_mulai = $request->tahun_mulai;
        $pengurus->tahun_berakhir = $request->tahun_berakhir;
        $pengurus->status = $request->status;
        $pengurus->save();

        return redirect()->route('index')->with('success','Berhasil menambah pengurus');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengurus $pengurus)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengurus $pengurus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengurus $pengurus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengurus $pengurus)
    {
        //
    }
}

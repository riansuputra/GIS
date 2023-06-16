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
    public function show()
    {
        $puras = Pura::all();
        $penguruses = Pengurus::all();
        return view('pages.pengurus.daftarPengurus', compact('puras','penguruses'));
    }

    /**
     * Display the specified resource.
     */
    public function showlist($id)
    {
        $puras = Pura::all();
        $puraid = DB::table('puras')
            ->where('id', '=', $id)->get();
        // $pelinggihs = Pelinggih::all();
        $penguruses = DB::table('penguruses')
            ->where('pura_id', '=', $id)->get();
        // $selected = DB::table('pelinggihs')
        //     ->where('id', '=', $id)->get();
        return view('pages.pengurus.listPengurus', compact('puras','penguruses','puraid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($puraid, $id)
    {
        $pura = Pura::find($puraid);
        $pengurus = Pengurus::find($id);
        return view('pages.pengurus.editPengurus', compact('pengurus','pura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $puraid, $id)
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

        $pura = Pura::find($puraid);
        $pengurus = Pengurus::find($id);
        $pengurus->update([
            'nama' => $request->nama,
            'sebagai' => $request->sebagai,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_berakhir' => $request->tahun_berakhir,
            'status' => $request->status,
        ]);        

        return redirect()->to($puraid.'/daftarpengurus')->with('success','Berhasil edit pengurus');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($puraid, $id)
    {
        $pura = Pura::find($puraid);
        $pengurus = Pengurus::find($id);
        $pengurus->delete();

        return redirect()->to($puraid.'/daftarpengurus')->with('success','Berhasil hapus pengurus');;
    }
    public function detail($id)
    {
        $puras = Pura::all();
        $fotos = Foto::all();
        $penguruses = Pengurus::find($id);
        $pelinggihs = Pelinggih::all();
        $cek = Pelinggih::where("pura_id", $id)->exists();

        // $pemangku = DB::table('penguruses')
        //     ->select('id')
        //     ->where('pura_id', '=', $id)->get();

        return view('pages.pengurus.detailPengurus', compact('puras','fotos','penguruses','pelinggihs','cek'));
    }
}

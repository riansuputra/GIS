<?php

namespace App\Http\Controllers;

use App\Models\Pelinggih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Foto;
use App\Models\Pura;
use App\Models\Pengurus;

class PelinggihController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
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
        return view('pages.pelinggih.addPelinggih', compact('puras'));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|string',
            'keterangan' => 'required',
        ]);

        $pelinggih = new Pelinggih;
        $pelinggih->pura_id = $request->pura_id;
        $pelinggih->nama = $request->nama;
        $pelinggih->keterangan = $request->keterangan;
        $pelinggih->save();

        $this->validate($request, [
            'fotos.*' => 'required',
        ]);

        $id_pel = Pelinggih::orderBy('id', 'DESC')->first()->id;
        if ($id_pel) {
            $fotos = [];
            if(!empty($request->file('fotos'))) {
                foreach($request->file('fotos') as $foto){
                    if($foto->isValid()){
                        $nama_image = time()."_".$foto->getClientOriginalName();
                        // Storage::putFileAs('public', $file, $nama_image);
                        $path = public_path('/foto/pelinggih');
                        $foto->move($path, $nama_image);
                        $fotos[] = [
                            'pura_id' => $request->pura_id,
                            'pelinggih_id' => $id_pel,
                            'is_thumbnail' => 1,
                            'foto' => $nama_image,
                            'type' => 'Pelinggih',
                        ];
                    }
                }
            }
            Foto::insert($fotos);
        }

        return redirect()->route('index')->with('success','Berhasil menambah pelinggih');;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $puras = Pura::all();
        $pelinggihs = Pelinggih::all();
        return view('pages.pelinggih.daftarPelinggih', compact('puras','pelinggihs'));
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
        $pelinggihs = DB::table('pelinggihs')
            ->where('pura_id', '=', $id)->get();
        return view('pages.pelinggih.listPelinggih', compact('puras','pelinggihs','puraid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelinggih $pelinggih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelinggih $pelinggih)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelinggih $pelinggih)
    {
        //
    }
}

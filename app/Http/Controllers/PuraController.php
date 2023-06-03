<?php

namespace App\Http\Controllers;

use App\Models\Pura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Foto;
use App\Models\Pelinggih;
use App\Models\Pengurus;


class PuraController extends Controller
{
    function __construct()
    {
        // $this->middleware('admin')->only('index','edit');
        $this->middleware('auth')->except('index','detail');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puras = Pura::all();
        $fotos = Foto::all();
        // dd($fotos);
        $penguruses = Pengurus::all();
        $pelinggihs = Pelinggih::all();
        return view('pages.map', compact('puras','fotos','pelinggihs','penguruses'));;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puras = DB::table('puras')->get();
        return view('pages.pura.addPura', compact('puras'));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required',
            'jenis_piodalan' => 'required',
            'sapta_wara' => 'nullable',
            'panca_wara' => 'nullable',
            'wuku' => 'nullable',
            'sasih' => 'nullable',
            'alamat' => 'required|string',
            'lat' => 'required',
            'lng' => 'required'
        ]);

        // dd($request);
        
        DB::table('puras')->insert($validasi);
        // dd($request);
        $this->validate($request, [
            'fotos.*' => 'required|file|image',
        ]);

        $id = Pura::orderBy('id', 'DESC')->first()->id;
        if ($id) {
            $fotos = [];
            if(!empty($request->file('fotos'))) {
                foreach($request->file('fotos') as $foto){
                    if($foto->isValid()){
                        $nama_image = time()."_".$foto->getClientOriginalName();
                        // Storage::putFileAs('public', $file, $nama_image);
                        $path = public_path('/foto/pura');
                        $foto->move($path, $nama_image);
                        $fotos[] = [
                            'pura_id' => $id,
                            'is_thumbnail' => 1,
                            'foto' => $nama_image,
                            'type' => 'Pura',
                        ];
                    }
                }
            }
            Foto::insert($fotos);
        }

        return redirect()->route('index')->with('success','Berhasil menambah pura');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $puras = Pura::all();
        return view('pages.pura.listPura', compact('puras'));
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $puras = Pura::find($id);
        $fotos = Foto::all();
        $penguruses = Pengurus::all();
        $pelinggihs = Pelinggih::all();

        // $pemangku = DB::table('penguruses')
        //     ->select('id')
        //     ->where('pura_id', '=', $id)->get();

        return view('pages.pura.detailPura', compact('puras','fotos','penguruses','pelinggihs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $puras = DB::table('puras')->get();
        $pura = Pura::find($id);

        return view('pages.pura.editPura', compact('puras','pura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pura $pura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pura $pura)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PuraController extends Controller
{
    function __construct()
    {
        // $this->middleware('admin')->only('index','edit');
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.map');
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
            'fotos.*' => 'required',
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
    public function show(Pura $pura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pura $pura)
    {
        //
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

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
        // $puras = Pura::all();
        // $fotos = DB::table('fotos')->where('type', '=', 'Pura')->get();
        $puras = Pura::leftJoin('fotos', 'puras.id', '=', 'fotos.pura_id')
            ->select('puras.*', 'fotos.foto')
            ->get();
        $fotos = Foto::all();
        // dd($puras);
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
            'bulan' => 'nullable',
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
        $cek = Pelinggih::where("pura_id", $id)->exists();

        // $pemangku = DB::table('penguruses')
        //     ->select('id')
        //     ->where('pura_id', '=', $id)->get();

        return view('pages.pura.detailPura', compact('puras','fotos','penguruses','pelinggihs','cek'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);
        $puras = DB::table('puras')->get();
        $pura = Pura::find($id);

        return view('pages.pura.editPura', compact('puras','pura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|string',
            'jenis' => 'required',
            'jenis_piodalan' => 'required|in:wuku,sasih',
            'sapta_wara' => 'nullable',
            'panca_wara' => 'nullable',
            'wuku' => 'nullable|required_without:sasih',
            'sasih' => 'nullable|required_without:wuku',
            'bulan' => 'nullable|required_without:wuku',
            'alamat' => 'required|string',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $pura = Pura::find($id);

        if($request->jenis_piodalan == 'wuku'){
            $oldSasih = Pura::where('id', '=', $id, 'and')
                            ->where('jenis_piodalan','=','sasih')
                            ->update(['sasih' => null, 'bulan' => null]);
        } else {
            $oldWuku = Pura::where('id', '=', $id, 'and')
                            ->where('jenis_piodalan', '=', 'Wuku')
                            ->update(['sapta_wara' => null, 'panca_wara' => null, 'wuku' => null]);
        }


        $pura->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jenis_piodalan' => $request->jenis_piodalan,
            'sapta_wara' => $request->sapta_wara,
            'panca_wara' => $request->panca_wara,
            'wuku' => $request->wuku,
            'sasih' => $request->sasih,
            'bulan' => $request->bulan,
            'alamat' => $request->alamat,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);        

        $this->validate($request, [
            'fotos.*' => 'required|file|image',
        ]);

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
        return redirect()->route('daftarpura')->with('success','Berhasil edit pura');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Foto::where('pura_id',$id)->delete();
        Pelinggih::where('pura_id',$id)->delete();
        Pengurus::where('pura_id',$id)->delete();
        $pura = Pura::find($id);
        $pura->delete();

        return redirect()->route('index')->with('success','Berhasil hapus pura');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PuraController extends Controller
{
    function __construct()
    {
        // $this->middleware('admin')->only('index','edit');
        // $this->middleware('auth');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\KrivicnoDelo;
use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Models\Sudija;
use App\Models\User;
use App\Http\Resources\KrivicnoDeloResource;
use App\Http\Resources\KrivicnoDeloCollection;

class KrivicnoDeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new KrivicnoDeloCollection(KrivicnoDelo::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KrivicnoDelo  $krivicnoDelo
     * @return \Illuminate\Http\Response
     */
    public function show(KrivicnoDelo $krivicnoDelo)
    {
        return new KrivicnoDeloResource($krivicnoDelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KrivicnoDelo  $krivicnoDelo
     * @return \Illuminate\Http\Response
     */
    public function edit(KrivicnoDelo $krivicnoDelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KrivicnoDelo  $krivicnoDelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KrivicnoDelo $krivicnoDelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KrivicnoDelo  $krivicnoDelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(KrivicnoDelo $krivicnoDelo)
    {
        //
    }
}

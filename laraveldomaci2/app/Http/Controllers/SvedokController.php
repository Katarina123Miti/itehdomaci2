<?php

namespace App\Http\Controllers;

use App\Models\Svedok;
use Illuminate\Http\Request;
use App\Models\Sudija;
use App\Models\KrivicnoDelo;
use App\Http\Resources\SvedokResource;
use App\Http\Resources\SvedokCollection;

class SvedokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SvedokCollection(Svedok::all());
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
     * @param  \App\Models\Svedok  $svedok
     * @return \Illuminate\Http\Response
     */
    public function show(Svedok $svedok)
    {
        return new SvedokResource($svedok);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Svedok  $svedok
     * @return \Illuminate\Http\Response
     */
    public function edit(Svedok $svedok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Svedok  $svedok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Svedok $svedok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Svedok  $svedok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Svedok $svedok)
    {
        //
    }
}

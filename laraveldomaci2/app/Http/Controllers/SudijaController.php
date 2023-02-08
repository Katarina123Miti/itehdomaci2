<?php

namespace App\Http\Controllers;

use App\Models\Sudija;
use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Models\KrivicnoDelo;
use App\Models\User;
use App\Http\Resources\SudijaResource;
use App\Http\Resources\SudijaCollection;


class SudijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sudijas=Sudija::all();
        return new SudijaCollection($sudijas);
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
     * @param  \App\Models\Sudija  $sudija
     * @return \Illuminate\Http\Response
     */
    public function show(Sudija $sudija)
    {
        return new SudijaResource($sudija);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sudija  $sudija
     * @return \Illuminate\Http\Response
     */
    public function edit(Sudija $sudija)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sudija  $sudija
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sudija $sudija)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sudija  $sudija
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sudija $sudija)
    {
        //
    }
}

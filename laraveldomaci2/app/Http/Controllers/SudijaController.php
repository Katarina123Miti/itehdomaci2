<?php

namespace App\Http\Controllers;

use App\Models\Sudija;
use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Models\KrivicnoDelo;
use App\Models\User;
use App\Http\Resources\SudijaResource;
use App\Http\Resources\SudijaCollection;
use Illuminate\Support\Facades\Validator;


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
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:150',
            'brojTelefona' => 'required|string|max:150|unique:sudijas',
            'godineIskustva' => 'required|numeric|lte:30|gte:1',
            'email' => 'required|email|unique:sudijas',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());
        
        if(auth()->user()->isUser())
            return response()->json('You are not authorized to create new sudijas.'); 
        $sudija = Sudija::create([
            'ime' => $request->ime,
            'brojTelefona' => $request->brojTelefona,
            'godineIskustva' => $request->godineIskustva,
            'email' => $request->email,
        ]);

        return response()->json(['Sudija is created successfully.', new SudijaResource($sudija)]);
    
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
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:150',
            'brojTelefona' => 'required|string|max:150|unique:sudijas,brojTelefona,'.$sudija->id,
            'godineIskustva' => 'required|numeric|lte:30|gte:1',
            'email' => 'required|email|unique:sudijas,email,'.$sudija->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());
         if(auth()->user()->isUser())
            return response()->json('You are not authorized to update sudijas.');  
        $sudija->ime = $request->ime;
        $sudija->brojTelefona = $request->brojTelefona;
        $sudija->godineIskustva = $request->godineIskustva;
        $sudija->email = $request->email;

        $sudija->save();

        return response()->json(['Sudija is updated successfully.', new SudijaResource($sudija)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sudija  $sudija
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sudija $sudija)
    {
        if(auth()->user()->isUser())
            return response()->json('You are not authorized to delete sudijas.');

        $svedok = Svedok::get()->where('sudija', $sudija_id);
        if (count($svedok) > 0)
                return response()->json('You cannot delete sudijas that have svedoks.');   
       
        $sudija->delete();

        return response()->json('Sudija is deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KrivicnoDelo;
use Illuminate\Http\Request;
use App\Models\Svedok;
use App\Models\Sudija;
use App\Models\User;
use App\Http\Resources\KrivicnoDeloResource;
use App\Http\Resources\KrivicnoDeloCollection;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:150|unique:krivicno_delos',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to create new krivicnadela.'); 

        $krivicnoDelo = KrivicnoDelo::create([
            'naziv' => $request->naziv,
        ]);

        return response()->json(['Krivicno delo is created successfully.', new KrivicnoDeloResource($krivicnoDelo)]);
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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:150|unique:krivicno_delos,naziv,' .$krivicnoDelo->id,
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isUser())
            return response()->json('You are not authorized to update krivicnadela.');     
        $krivicnoDelo->naziv = $request->naziv;

        $krivicnoDelo->save();

        return response()->json(['Krivicno delo is updated successfully.', new KrivicnoDeloResource($krivicnoDelo)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KrivicnoDelo  $krivicnoDelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(KrivicnoDelo $krivicnoDelo)
    {
        if(auth()->user()->isUser())
             return response()->json('You are not authorized to delete krivicnadela.');
        
        $svedok = Svedok::get()->where('krivicnoDelo', $krivicnoDelo->id);
        if (count($svedok) > 0)
            return response()->json('You cannot delete krivicnadela that have svedoks.');
       
        $krivicnoDelo->delete();

        return response()->json('Krivicno delo is deleted successfully.');
    }
}

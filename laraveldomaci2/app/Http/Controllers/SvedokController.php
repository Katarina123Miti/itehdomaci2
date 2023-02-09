<?php

namespace App\Http\Controllers;

use App\Models\Svedok;
use Illuminate\Http\Request;
use App\Models\Sudija;
use App\Models\KrivicnoDelo;
use App\Models\User;
use App\Http\Resources\SvedokResource;
use App\Http\Resources\SvedokCollection;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'datumIVreme' => 'required|date',
            'krivicnodelo' => 'required|numeric|gte:1|lte:5',
            'note' => 'required|string|min:10',
            'sudija' => 'required|numeric|gte:1|lte:10',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to create new svedok.');     

        $svedok = Svedok::create([
            'datumIVreme' => $request->datumIVreme,
            'user' => auth()->user()->id,
            'krivicnodelo' => $request->krivicnodelo,
            'note' => $request->note,
            'sudija' => $request->sudija,
        ]);

        return response()->json(['Svedok is created successfully.', new SvedokResource($svedok)]);
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
        $validator = Validator::make($request->all(), [
            'datumIVreme' => 'required|date',
            'user' => 'required|numeric|digits_between:1,5',
            'krivicnodelo' => 'required|numeric|gte:1|lte:5',
            'note' => 'required|string|min:10',
            'sudija' => 'required|numeric|gte:1|lte:10',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to update svedok.');    

        if(auth()->user()->id != $svedok->user)
            return response()->json('You are not authorized to update someone elses svedok.');      
       
        $svedok->datumIVreme = $request->datumIVreme;
        $svedok->user = auth()->user()->id;
        $svedok->krivicnodelo = $request->krivicnodelo;
        $svedok->note = $request->note;
        $svedok->sudija = $request->sudija;

        $apprat->save();

        return response()->json(['Svedok is updated successfully.', new SvedokResource($svedok)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Svedok  $svedok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Svedok $svedok)
    {
        if(auth()->user()->isAdmin())
            return response()->json('You are not authorized to delete svedok.');    

        if(auth()->user()->id != $svedok->user)
            return response()->json('You are not authorized to delete someone elses svedok.');
       
        $svedok->delete();

        return response()->json('Svedok is deleted successfully.');
    }
}

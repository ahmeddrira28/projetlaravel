<?php

namespace App\Http\Controllers;

use App\Models\marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marque = Marque::with('types')->get()->toArray();
return array_reverse($marque);
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
        $marque = new Marque([
            'nommarque' => $request->input('nommarque'),
            'imagemarque' => $request->input('imagemarque'),
            'typeID' => $request->input('typeID'),
            ]);
            $marque->save();
            return response()->json('Marque créée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(marque $marque)
    {
        //
        $marque = Marque::find($id);
return response()->json($marque);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marque $marque)
    {
        //
        $marque = Marque::find($id);
$marque->update($request->all());
return response()->json('Marque MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(marque $marque)
    {
        //$marque = Marque::find($id);
$marque->delete();
return response()->json('Marque supprimée !');
    }
    public function showMarqueByType($idtype)
{
 $Marque= Marque::where('ctypeID', $idtype)->with('types')->get()->toArray();
return response()->json($Marque);
}
}

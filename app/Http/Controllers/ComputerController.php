<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $computers = Computer::with('types','marques')->get()->toArray();
        return array_reverse($computers); 
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
        $computer = new Computer([
            'Reference' => $request->input('Reference'),
            'Ecran' => $request->input('Ecran'),
            'Processeur' => $request->input('Processeur'),
            'Ram' => $request->input('Ram'),
            'Disque' => $request->input('Disque'),
            'CarteGraphique' => $request->input('CarteGraphique'),
            'prix' => $request->input('prix'),
            'imagecomgrandf' => $request->input('imagecomgrandf'),
            'imagecompetitf' => $request->input('imagecompetitf'),
            'typeID' => $request->input('typeID'),
            'marqueID' => $request->input('marqueID')
            ]);
            $computer->save();
            return response()->json('Computer créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $computer)
    {
        //
        $computer= Computer::find($id);
        return response()->json($computer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computer $computer)
    {
        //
        $computer = Computer::find($id);
        $computer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        //
        $computer = Computer::find($id);
        $computer->delete();
        return response()->json('Computer supprimé !');

    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Http\Request;
class TypeController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$type = Type::all()->toArray();
return array_reverse($type);
}
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$type = new Type([
'nomtype' => $request->input('nomtype'),
'imagetype' => $request->input('imagetype')
]);
$type->save();
return response()->json('Type créée !');
}
/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$type = Type::find($id);
return response()->json($type);
}
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$type = Type::find($id);
$type->update($request->all());
return response()->json('Type MAJ !');
}
/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
$type = Type::find($id);
$type->delete();
return response()->json('Type supprimée !');
}
}

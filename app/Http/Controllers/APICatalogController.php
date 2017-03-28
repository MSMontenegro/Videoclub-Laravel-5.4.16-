<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json( Movie::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $p = new Movie;
      $p->title = $request->input('title');
      $p->year = $request->input('year');
      $p->director = $request->input('director');
      $p->poster = $request->input('poster');
      $p->rented = true;
      $p->synopsis = $request->input('synopsis');
      $p->save();
      return response()->json( ['error' => false,'msg' => 'La película se ha guardado exitosamente!' ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return response()->json(Movie::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $p = Movie::findOrFail($id);
      $p->title = $request->input('title');
      $p->year = $request->input('year');
      $p->director = $request->input('director');
      $p->poster = $request->input('poster');
      $p->rented = true;
      $p->synopsis = $request->input('synopsis');
      $p->save();
      return response()->json( ['error' => false,'msg' => 'La película ha sido modificada exitosamente!' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $p = Movie::findOrFail($id);
      $p->delete();
      return response()->json( ['error' => false,'msg' => 'La película fue eliminada exitosamente!' ] );
    }

    public function putRent($id) {
      $m = Movie::findOrFail( $id );
      $m->rented = true;
      $m->save();
      return response()->json( ['error' => false,'msg' => 'La película se ha alquilado exitosamente!' ] );
    }

    public function putReturn($id) {
      $m = Movie::findOrFail( $id );
      $m->rented = false;
      $m->save();
      return response()->json( ['error' => false,'msg' => 'La película ha sido devuelta correctamente!' ] );
    }
}

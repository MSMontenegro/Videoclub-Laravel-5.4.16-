<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Notification;

class CatalogController extends Controller
{

  public function getIndex(){
    return view('catalog.index',array('arrayPeliculas'=>Movie::all()));
  }

  public function getShow($id){
    return view('catalog.show', array('pelicula'=>$model = Movie::findOrFail($id)));
  }

  public function getCreate(){
    return view('catalog.create');
  }

  public function getEdit($id){
    return view('catalog.edit', array('pelicula'=>$model = Movie::findOrFail($id)));
  }

  public function postCreate(Request $request){
    $p = new Movie;
    $p->title = $request->input('title');
    $p->year = $request->input('year');
    $p->director = $request->input('director');
    $p->poster = $request->input('poster');
    $p->rented = true;
    $p->synopsis = $request->input('synopsis');
    $p->save();
    Notification::success('La película se ha guardado exitosamente!');
    return redirect('/catalog');
  }

  public function putEdit(Request $request, $id){
    $p = Movie::findOrFail($id);
    $p->title = $request->input('title');
    $p->year = $request->input('year');
    $p->director = $request->input('director');
    $p->poster = $request->input('poster');
    $p->rented = true;
    $p->synopsis = $request->input('synopsis');
    $p->save();
    Notification::success('La película ha sido modificada exitosamente!');
    return redirect('/catalog/show/'.$id);
  }

  public function putRent(Request $request, $id){
    $p = Movie::findOrFail($id);
    $p->rented = true;
    $p->save();
    Notification::success('La película se ha alquilado exitosamente!');
    return redirect('/catalog/show/'.$id);
  }

  public function putReturn(Request $request, $id){
    $p = Movie::findOrFail($id);
    $p->rented = false;
    $p->save();
    Notification::success('La película ha sido devuelta correctamente!');
    return redirect('/catalog/show/'.$id);
  }

  public function deleteMovie(Request $request, $id){
    $p = Movie::findOrFail($id);
    $p->delete();
    Notification::success('La película fue eliminada exitosamente!');
    return redirect('/catalog');
  }
}

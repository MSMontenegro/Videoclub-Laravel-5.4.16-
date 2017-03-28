@extends('layouts.master')

@section('content')

    <div class="row">

    <div class="col-sm-4">

      <img src="{{$pelicula->poster}}" alt="{{$pelicula->title}}">

    </div>
    <div class="col-sm-8">

      <h2> {{$pelicula->title}} </h2>
      <h4> Año: {{$pelicula->year}} </h4>
      <h4> Director: {{$pelicula->director}} </h4>
      <p> <b> Resumen: </b> {{$pelicula->synopsis}} </p>
      <p> <b> Estado: </b>
        @if ($pelicula->rented)
          Película actualmente alquilada
        @else
          Película disponible
        @endif
      </p>

      @if ($pelicula->rented)
        <form action="{{action('CatalogController@putReturn', $pelicula->id)}}" method="POST" style="display:inline">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-danger" style="display:inline">
            Devolver película
          </button>
        </form>
      @else
        <form action="{{action('CatalogController@putRent', $pelicula->id)}}" method="POST" style="display:inline">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary" style="display:inline">
            Alquilar película
          </button>
        </form>
      @endif

      <a class="btn btn-warning" href="{{ url('/catalog/edit/'.$pelicula->id) }}" role="button">
        Editar película
      </a>
      <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}" method="POST" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-default" style="display:inline">
          Eliminar película
        </button>
      </form>
      <a class="btn btn-default" href="{{ url('/catalog') }}" role="button">
        Volver al listado
      </a>

    </div>
</div>

@stop

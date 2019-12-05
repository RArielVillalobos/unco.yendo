@extends('theme.back.layout.admin')

@section('title','ranking')

@section('head')
@endsection
@section('content')
    <div class="container">
          <h4>ranking de usuarios</h4>
          <ul>
          <li> Usuario   -   Voto    -    Comentario </li>
          @foreach($usuarios as $usuario)
           <li>{{ $usuario -> user_to_id }}   -      {{ $usuario -> votos }}    -      {{ $usuario -> comentario }} </li>
          @endforeach
          </ul>
        
    </div>



@endsection
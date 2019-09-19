@extends('theme.back.layout.admin')

@section('title','Unco.Yendo')

@section('head')


@endsection

@section('content')
    <div class="row">
        <div class="col s12 m12 mt-1 l4">
            <a class="waves-effect orange darken-1 btn"><i class="material-icons left">airport_shuttle</i>Quiero que me lleven</a>


        </div>
        <div class="col s12 m12 mt-1 l4">
            <a href="{{route('trip.create')}}" class="waves-effect orange darken-1 btn"><i class="material-icons left">add_circle_outline</i>Crear Viaje</a>


        </div>


    </div>


@endsection